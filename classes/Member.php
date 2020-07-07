<?php
/* by OpenClassRoom 2017 */
class Member {
  private $_id,
          $_name,
          $_password,
		  $_level;
  public  $level;

  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
	$this->level = $this->_level;
  }
  
  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);// if key = id, $method = setId;
      
      if (method_exists($this, $method)) // si la methode existe elle
                // est appellée    pour controler la valeur...
      {
        $this->$method($value);
      }
    }
  
    foreach ($donnees as $key => $value)
    {
      $method = 'add'.ucfirst($key);// if key = id, $method = setId;
      
      if (method_exists($this, $method)) // si la methode existe elle
                // est appellée    pour controler la valeur...
      {
        $this->$method($value);
      }
    }
  }
  
  // GETTERS //
  public function id()
  {
    return $this->_id;
  }
  public function name()
  {
    return $this->_name;
  } 
  public function password()
  {
    return $this->_password;
  }
  public function level()
  {
	  return $this->_level;
  }
  
  // Rajout de Marc H. 05/08/17 avec fierté !
  public function nameValide() // Input name cannot be empty
  {
	return !empty($this->_name); // empty: the var exists but is empty.
  }
  public function passwordValide() // Input name cannot be empty
  {
	return !empty($this->_password); // empty: the var exists but is empty.
  }
  // Fin du rajout de Marc
  
  public function setId($id)
  {
    $id = (int) $id;
    
    if ($id > 0)
    {
      $this->_id = $id;
    }
  }
  public function setName($name)
  {
    if (is_string($name))
    {
      $this->_name = $name;
    }
  }
  public function setPassword($password)
  {
	  if(is_string($password))
	  {
        $this->_password = $password;
	  }
  }
  public function setLevel($level)
  {
	$level = (int) $level;
	  
      $this->_level = $level;
  }
}//Close class Member