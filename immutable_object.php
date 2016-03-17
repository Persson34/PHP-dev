<?php
	/*************************************
		Immutable class example.
	*************************************/
	class ImmutableClass{
		private $paramA;	//@var int
		private $paramB;	//@var string
		private $paramC;	//@var string
		
		/**
		* @param int 	$paramA		
		* @param string $paramB		
		* @param string $paramC		
		*/
		public function __construct($paramA, $paramB, $paramC){
			//Validate params...
			
			$this->paramA = $paramA;
			$this->paramB = $paramB;
			$this->paramC = $paramC;
			
			//Validate class state...
		}
		/**
		* @return int
		*/
		public function getParamA(){
			return $this->paramA;
		}

		/**
		* @return ImmutableClass
		*/
		public function changeState(){
			//Perform work...
			$paramA = $this->paramA;
			$newParamA = $paramA + 5;
			
			return new ImmutableClass($newParamA, $this->paramB, $this->paramC);
		}
	}
	
	/*****************************************************
	There are a few important items of note about this class:

	1. The constructor is used to create the class.
	2. Validation of class state is handled in the constructor only.
	3. No setters.
	4. Getters are ok.
	5. Anything that could modify the class’s state results in a new object being created instead.
	
	Testing a class that is written to be immutable is fairly straight forward.

	1. Test the constructor to ensure that the exceptions are thrown for bad input data.
	2. Test any getters.
	3. Test any methods that create new objects and ensure those objects are created with the correct state.
	4. Test any side-effects.	
	*****************************************************/
	
	/*****************************************************
		Creating Immutable Objects
	*****************************************************/
	class ImmutableClassBuilder{
		private $paramA; //@var int
		private $paramB; //@var string
		private $paramC; //@var string
		
		/**
		* @param int $paramA
		*
		* @return $this
		*/
		public function withParamA($paramA){
			$this->paramA = $paramA;
			return $this;
		}
		
		/**
		* @param string $paramB
		*
		* @return $this
		*/
		public function withParamB($paramB){
			$this->paramB = $paramB;
			return $this;
		}
		
		/**
		* @param int $paramC
		*
		* @return $this
		*/
		public function withParamC($paramC){
			$this->paramC = $paramC;
			return $this;
		}
		
		/**
		* @return ImmutableClass
		*/
		public function build(){
			$paramA = $this->paramA;
			$paramB = $this->paramB;
			$paramC = $this->paramC;
			
			return new ImmutableClass($paramA, $paramB, $paramC);
		}
	}
	
	//Here is example of using it.
	$builder = new ImmutableClassBuilder();
	$builder->withParamA(1);
	$builder->withParamB('2');
	$builder->withParamC('3');
	
	$immutableClass = $builder->build();
	
	var_dump($immutableClass);
	
	//Here is another example of using it.
	$immutableClass1 = (new ImmutableClassBuilder())
						->withParamA(2)
						->withParamB('4')
						->withParamC('7')
						->build();
	
	var_dump($immutableClass1);
	
?>