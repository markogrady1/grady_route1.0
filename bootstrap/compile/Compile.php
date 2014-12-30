<?php namespace compile;

class Compile {

	/**
	 * Name of a given file
	 * 
	 * @var string $file
	 */
	public $file = null;
	
	/**
	 * Complete file name with extension
	 * 
	 * @var string $wholeFileName
	 */
	public $wholeFileName = null;

	/**
	 * Set value of a given filename
	 * 
	 * @param string $file
	 */
	public function __construct($file) {

		$this->fileToCompile = $file;
	}

	/**
	 * Prepare and compile file for viewing
	 * 
	 * @param  array  $values 
	 * @return void
	 */
	public function compile($values = array()) {

		if(is_file($this->fileToCompile)) {
		
		$file = file_get_contents($this->fileToCompile);

		$templated = $this->placeSyntax($file);
		
		$strippedFileName = $this->stripFileName($file);

		$newFile = $this->prepareCompileFile($strippedFileName);
		
		$this->compileFile($newFile, $templated);

		$this->displayCompiledFile($newFile, $values);

		}else{

			echo $this->fileToCompile;
			echo 'This file does not exist';

		}
	}

	/**
	 * Change syntax in compiled file
	 * 
	 * @param  string $file
	 * @return string
	 */
	public function placeSyntax($file) {
		$eol = ",'<br>'";
		if(preg_match('/{/', $file)) {

			$templated = preg_replace(array('/[{]{2}/','/[}]{2}/'), array('<?php ',' ?>'), $file);

			$templated = str_replace(
				array('{',  '}', '&lt;', '&gt;', 'endforeach','endfor', ') ?>','.PHP_EOL',' .PHP_EOL',' . PHP_EOL','. PHP_EOL'),
				array('<?php echo ', ' ?>', '<', '>', '}','}', ') { ?>',$eol, $eol, $eol, $eol),
				$templated);


			return $templated;
		}

		return $file;
	}


	/**
	 * Remove extension from file name
	 * 
	 * @param  string $file
	 * @return string
	 */
	public function stripFileName($file) {

		$fileName = pathinfo($this->fileToCompile, PATHINFO_FILENAME);

		return $fileName;
	}

	/**
	 * Prepare compiled file name
	 * @param  string $fileName
	 * @return string
	 */
	public function prepareCompileFile($fileName) {

		$newFile = $fileName.'Copy.php';

		return $newFile;
	}

	/**
	 * Create new compiled file
	 * 
	 * @param  string $newFile
	 * @param  string $templated 
	 * @return void       
	 */
	public function compileFile($newFile, $templated) {

		file_put_contents('../bootstrap/compile/compiled/'.$newFile, $templated);
	}

	/**
	 * Display compiled file contents
	 * 
	 * @param  string $newFile 
	 * @param  array $data    [description]
	 * @return void
	 */
	public function displayCompiledFile($newFile, $data =[]) {

		$newFileContents = file_get_contents('../bootstrap/compile/compiled/'.$newFile);
		
		require('../bootstrap/compile/compiled/'.$newFile);
	}

    public function displayIt() {

    }
}

