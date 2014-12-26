<?php namespace coreLib;

require __DIR__ . '/../config/config.php';

class Base
{

    private $pdo;

    /*
    *
    *
    *
    */
    private $error = false;

    /*
    *
    *
    *
    */
    private $query;

    /*
    *
    *
    *
    */
    private $results;

    /*
    *
    *
    *
    */
    private $count = 0;

    /*
    *
    *
    *
    */
    private static $instance = null;

    /**
     * Returns a database connection.
     *
     * @return array
     */
    public function getConnection()
    {

        $options = array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_BOTH, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);
        $this->pdo = new \PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);

        return $this->pdo;
    }

    /*
	*
	*
	*
	*/
    public function query($sql, $params = array())
    {//note passed params array must be in same places as query

        $this->error = false;

        if ($this->query = $this->pdo->prepare($sql)) {
            $pos = 1;

            if (count($params)) {

                foreach ($params as $param) {
                    $this->query->bindValue($pos, $param);

                    $pos++;
                }
            }
            if ($this->query->execute()) {
                /*	Store results */
                $this->results = $this->query->fetchAll(\PDO::FETCH_BOTH);
                /*	Store number of rows returned */
                $this->count = $this->query->rowCount();

            } else {

                $this->error = true;
            }

            return $this;
        }

    }

    private function action2($action, $table, $where = array(), $condition)
    {
        if (count($where) === 3) {
            $operators = array(
                '=', '<', '>', '<=', '>=', '<>', '!=',
                'like', 'not like', 'between', 'ilike',
                '&', '|', '^', '<<', '>>',
                'rlike', 'regexp', 'not regexp',
            );

            $field = $where[0];

            $operator = $where[1];

            $value = $where[2];

            if (in_array($operator, $operators)) {

                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

                if (isset($condition)) {

                    if (count($condition) == 2) {

                        $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?{$condition[0]} {$condition[1]}";

                    }
                }
                if (!$this->query($sql, array($value))->error()) {

                    return $this;
                }

            }
        }

        return false;
    }

    /*
	*
	*
	*
	*/
    private function action($action, $table, $where = array(), $condition)
    {

        if (count($where) === 3) {

            $operators = array(
                '=', '<', '>', '<=', '>=', '<>', '!=',
                'like', 'not like', 'between', 'ilike',
                '&', '|', '^', '<<', '>>',
                'rlike', 'regexp', 'not regexp',
            );

            $field = $where[0];

            $operator = $where[1];

            $value = $where[2];

            if (in_array($operator, $operators)) {

                $append = $this->setCondition($condition);

                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ? " . $append;

                if (!$this->query($sql, array($value))->error()) {

                    return $this->results;
                }

            }
        }
        if (!$where) {

            $append = $this->setCondition($condition);

            $sql = "{$action} FROM {$table} " . $append;

            if (!$this->query($sql, null)->error()) {

                return $this->results;
            }

        }

        return false;
    }

    public function setCondition(array $condition)
    {
        $sqlAppend = "";

        if (isset($condition)) {

            if (count($condition) == 2) {

                $sqlAppend = " {$condition[0]} {$condition[1]}";

                return $sqlAppend;

            } elseif (count($condition) == 3) {

                $sqlAppend = " {$condition[0]} {$condition[1]}  {$condition[2]}";

                return $sqlAppend;
            } elseif (count($condition) == 4) {

                $sqlAppend = " {$condition[0]} {$condition[1]}  {$condition[2]}  {$condition[3]}";

                return $sqlAppend;
            } elseif (count($condition) == 5) {

                $sqlAppend = " {$condition[0]} {$condition[1]}  {$condition[2]}  {$condition[3]}  {$condition[4]}";

                return $sqlAppend;
            }


        }
        return $sqlAppend;
    }

    /*
*
*
*
*/
    public function get($table, $where = array(), $condition = array())
    { //[1]

        $data = $this->action("SELECT * ", $table, $where, $condition);

        return $data;
    }


    /**
     * query with select condition
     */
//    public function getWithCondition($table, $where = array(), $condition = array())
//    {
//        if() {}
//        $data = $this->action($queryCondition,)
//    }

    /*
    *
    *
    *
    */
    public function delete($table, $where = array())
    {

        $this->action("DELETE ", $table, $where);
        $this->notify($this->count);
    }

    /*
    *
    *
    *
    */
    public function results()
    {

        return $this->results;
    }

    /*
    *
    *
    *
    */
    public function first()
    {    //[2]

        $first = $this->results()[0];

        return $first;
    }

    /*
    *
    *
    *
    */
    public function insert($table, $fields)
    {    //[3]
        if (count($fields)) {

            $keys = array_keys($fields);

            $sql = "INSERT INTO {$table} (" . implode(',', $keys) . ") ";

            $placeHolders = $this->getPlaceHolder($fields);

            $sql .= " VALUES({$placeHolders}) ";

            if (!$this->query($sql, array_values($fields))) {

                return $this;
            }

            $this->notify($this->count);

        }
    }

    /*
    *
    *
    *
    */
    public function  notify()
    {
        if (!$this->error)
            echo 'Table updated, ' . $this->count . ' row(s) affected';
        else
            echo 'Table not updated';
    }

    /*
    *
    *
    *
    */
    public function error()
    {

        return $this->error;
    }

    /*
    *
    *
    *
    */
    public function getPlaceHolder($fields = array())
    {
        $pholder = str_repeat("?, ", count($fields) - 1);

        return $pholder . "?";
    }
}

/*
|	Implementation:
|	[1]	$db->first()->title;
|	[2]	$db->get('blgs' ,array('id', '=', 49));
|	[3]	$db->insert('plain_user',array('username'=>'mark','password'=>'hohooh'));
|
|
|
| $db = DB::getInstance();
|
| //$db->delete('plain_user' ,array('username', '=','marky'));
| $db->insert('plain_user',array('username'=>'marky','password'=>'hohooh'));
| if($db->error())
|	echo '';
| else{
|	foreach ($db->results() as $d) {
|		echo $d->title.'<br>';
|	}
| }
|	///echo $db->first()->title;
|
*/
