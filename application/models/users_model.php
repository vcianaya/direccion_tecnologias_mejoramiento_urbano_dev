<?php 
class Users_model extends CI_Model{
	function __construct()
	{
		parent:: __construct();
		$this->load->database(); 
	}
		function search_jobs_mininoo()
		{
			
			$this->db->select('*');
			$this->db->from('empleos');
			$this->db->order_by('id','desc');
			$this->db->limit('1');
			
			$usuarios = $this->db->get();

 return $usuarios->result();
		}
	
		function search_jobs_mininoo2()
		{
			
			$this->db->select('*');
			$this->db->from('empleos');
			$this->db->order_by('id','desc');
			$this->db->limit('2');
			
			$usuarios = $this->db->get();

 return $usuarios->result();
 
		}
		function search_jobs_mininoo3()
		{
			
			$this->db->select('*');
			$this->db->from('empleos');
			$this->db->order_by('id','desc');
			$this->db->limit('3');
			
			$usuarios = $this->db->get();

 return $usuarios->result();
		}
		function search_jobs_mininoo4()
		{
			
			$this->db->select('*');
			$this->db->from('empleos');
			$this->db->order_by('id','desc');
			$this->db->limit('4');
			
			$usuarios = $this->db->get();

 return $usuarios->result();
		}
		function search_jobs_mininoo5()
		{
			
			$this->db->select('*');
			$this->db->from('empleos');
			$this->db->order_by('id','desc');
			$this->db->limit('5');
			
			$usuarios = $this->db->get();

 return $usuarios->result();
		}
	 function results_jobs($job_posting) {
	$this->db->where('job_type',$job_posting['job_type']);

	
 $this->db->from('empleos'); //obtenemos la tabla 'contacto'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 $usuarios = $this->db->get();

 return $usuarios->result(); //devolvemos el resultado de lanzar la query.
 } 
 
  function results_jobs_buscar($job_posting) {
	  $id = $_POST['id'];
	$this->db->where('id',$id);

	
 $this->db->from('empleos'); //obtenemos la tabla 'contacto'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 $usuarios = $this->db->get();

 return $usuarios->result(); //devolvemos el resultado de lanzar la query.
 } 
 function results_jobs_buscar2($id) {
	 
	$this->db->where('id',$id);

	
 $this->db->from('empleos'); //obtenemos la tabla 'contacto'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 $usuarios = $this->db->get();

 return $usuarios->result(); //devolvemos el resultado de lanzar la query.
 } 
 
  function results_jobs_2() {

 $this->db->from('empleos'); //obtenemos la tabla 'contacto'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 $usuarios = $this->db->get();

 return $usuarios->result(); //devolvemos el resultado de lanzar la query.
 } 
 
	 function consultita($search) 
	   { 
          	
		$this->db->select('*'); //from empleos where ((contenido like %$palabra1) or (%titulo like %$palabra2%))'
	  //obtenemos la tabla 'contacto'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
	 $this->db->where('campo',$search['campo']);
	 
	 $this->db->from('empleos');
 $usuarios = $this->db->get();

 return $usuarios->result();
		//return $query->row();
		//if($query->num_rows > 0) return $query->result();
		   
		    
        } 
		function consultita2($data)
		{
			$id= $_POST['id'];
			$this->db->select('*');
			$this->db->where('id',$id);
			$this->db->from('my_profile');
			$usuarios = $this->db->get();

 return $usuarios->result();
		}
		
		
 function verif($ExixteUsuarioyPassword) {
				$email =$_POST['email'];
	$this->db->where('email',$email);
 $this->db->from('my_profile'); //obtenemos la tabla 'contacto'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 $usuarios = $this->db->get();

 return $usuarios->result(); //devolvemos el resultado de lanzar la query.
 } 
 function verif2($id) {
				$id =$_POST['id'];
	$this->db->where('id',$id);
 $this->db->from('my_profile'); //obtenemos la tabla 'contacto'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 $usuarios = $this->db->get();

 return $usuarios->result(); //devolvemos el resultado de lanzar la query.
 } 
 
  function verification($buscando) {
			
	//$this->db->where('id',$id);
 $this->db->from('employer'); //obtenemos la tabla 'contacto'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 $usuarios = $this->db->get();

 return $usuarios->result(); //devolvemos el resultado de lanzar la query.
 } 
 
 
 
		function getData_blog($id) {
				
	$this->db->where('id', $id);
 $this->db->from('my_profile'); //obtenemos la tabla 'contacto'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 $usuarios = $this->db->get();

 return $usuarios->result(); //devolvemos el resultado de lanzar la query.
 } 
 
 function ss($res) {
	
			$email= $_POST['email'];
	$this->db->where('email', $email);
 $this->db->from('experience'); //obtenemos la tabla 'contacto'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 $usuarios2 = $this->db->get();

 return $usuarios2->result(); //devolvemos el resultado de lanzar la query.
 } 
		
	function ValidarContact($id){

	$usuarios= $this->db->where('id',$id);
	$usuarios= $this->db->get('my_profile');
	return $usuarios->result();
}
function ValidarContact_resume($email){

	$usuarios= $this->db->where('email',$email);
	$usuarios= $this->db->get('my_profile');
	return $usuarios->result();
}
function ValidarContact_resume_email($id_myProfile){

	$usuarios= $this->db->where('id',$id_myProfile);
	$usuarios= $this->db->get('my_profile');
	return $usuarios->result();
}
	
	function validar_education_profile($id){
	$this->db->select('*');
	$this->db->from('my_profile');
	$this->db->join('education_level', 'education_level.id = my_profile.id');
	 $usuarios = $this->db->get();
	return $usuarios->result();
	
}

	/*function new_user($username,$password)
	{
       $data = array(
            'username' => $username,
            'password' => $password
        'nick' => $nick,
            'password' => $password
			
        );
        $this->db->insert('usuarios', $data);	
    }
}*/

function ValidarUsuario($email,$password){
	//$query=$this->db->get('profile');
	$usuarios= $this->db->where('email',$email);
	$usuarios= $this->db->where('password',$password);
	$usuarios= $this->db->get('my_profile');
	return $usuarios->result();
}

function ValidarSelect($first_name,$last_name){
	//$query=$this->db->get('profile');
	$query= $this->db->where('id',1);
	$query= $this->db->get('my_profile');
	return $query->row();
}


}

	/*if($value == 'hola5'){
		return false;
	}
	else
	{
		return true;
	}*/


?>