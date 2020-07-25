<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class Generic extends Model
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    function findByCondition($condition_array, $tablename, $type_con = 'where', $orderbyfield=null, $d_order='asc')
	{
        $builder = $this->db->table($tablename);

        $builder->select('*');
        if($type_con == 'like')
        {$builder->orlike($condition_array);}
        else{$builder->where($condition_array);}
		// Clause to only fetch data with deletedat field set to null
		$builder->where(array('deleted'=>0));
		
		if($orderbyfield != NULL && $orderbyfield != '')
			$builder->orderBy("$tablename.$orderbyfield", $d_order);
		
		$query = $builder->get();
		if ($builder->countAll() > 0)
			return $query->getResultArray();
		else
			return false;
    }
    
    public function getIceAndFireAPI() 
    {

        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://www.anapioficeandfire.com/api/books?page=1&pageSize=5"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);      

        $data = json_decode($output);

        return $data;


    } 

    function findByNameIceAndFireAPI($condition_array)
	{ 
        $url = 'https://www.anapioficeandfire.com/api/books?name='.urlencode($condition_array);

        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);      

        $data = json_decode($output);

        return $data;
    }
}

