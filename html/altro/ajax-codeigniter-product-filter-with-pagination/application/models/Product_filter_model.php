
<?php

class Product_filter_model extends CI_Model
{
 function fetch_filter_type($type)
 {
  $this->db->distinct();
  $this->db->select($type);
  $this->db->from('product');
  $this->db->where('product_status', '1');
  return $this->db->get();
 }

 function make_query($minimum_price, $maximum_price, $brand, $ram, $storage,$product_name)
 {
  $query = " SELECT * FROM product WHERE product_status = '1' ";

    
    if(isset($brand,$ram,$storage,$minimum_price, $maximum_price)) {
        $brand_filter = implode("','", $brand);
        $ram_filter = implode("','", $ram);
        $storage_filter = implode("','", $storage);
        $query.= "AND 
        product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') &&  product_ram IN('" . $ram_filter . "') && product_storage IN('" . $storage_filter . "') && product_brand LIKE ('%" . $product_name . "%') ||
        product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') &&  product_ram IN('" . $ram_filter . "') && product_storage IN('" . $storage_filter . "') && product_storage LIKE ('%" . $product_name . "%') ||
        product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') &&  product_ram IN('" . $ram_filter . "') && product_storage IN('" . $storage_filter . "') && product_name LIKE ('%" . $product_name . "%') || 
        product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') &&  product_ram IN('" . $ram_filter . "') && product_storage IN('" . $storage_filter . "') && product_ram LIKE ('%" . $product_name . "%') || 
        product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') &&  product_ram IN('" . $ram_filter . "') && product_storage IN('" . $storage_filter . "') && product_price LIKE ('%" . $product_name . "%') || 
        product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') &&  product_ram IN('" . $ram_filter . "') && product_storage IN('" . $storage_filter . "') && product_camera LIKE ('%" . $product_name . "%')";

    }else

    if(isset($brand,$ram,$minimum_price, $maximum_price)){ 
        $product_name = $product_name;
        $brand_filter = implode("','", $brand);
        $ram_filter = implode("','", $ram);
         $query.= "AND 
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') &&  product_ram IN('" . $ram_filter . "')  && product_brand LIKE ('%" . $product_name . "%') ||
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') &&  product_ram IN('" . $ram_filter . "')  && product_storage LIKE ('%" . $product_name . "%') ||
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') &&  product_ram IN('" . $ram_filter . "')  && product_name LIKE ('%" . $product_name . "%') || 
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') &&  product_ram IN('" . $ram_filter . "')  && product_ram LIKE ('%" . $product_name . "%') || 
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') &&  product_ram IN('" . $ram_filter . "')  && product_price LIKE ('%" . $product_name . "%') || 
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') &&  product_ram IN('" . $ram_filter . "')  && product_camera LIKE ('%" . $product_name . "%')";

    }else

    if(isset($brand,$storage,$minimum_price, $maximum_price)){
        $product_name = $product_name;
        $brand_filter = implode("','", $brand);
        $storage_filter = implode("','", $storage);
        $query.= "AND 
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') && product_storage IN('" . $storage_filter . "') && product_brand LIKE ('%" . $product_name . "%') ||
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') && product_storage IN('" . $storage_filter . "') && product_storage LIKE ('%" . $product_name . "%') ||
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') && product_storage IN('" . $storage_filter . "') && product_name LIKE ('%" . $product_name . "%') || 
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') && product_storage IN('" . $storage_filter . "') && product_ram LIKE ('%" . $product_name . "%') || 
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') && product_storage IN('" . $storage_filter . "') && product_price LIKE ('%" . $product_name . "%') || 
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "') && product_storage IN('" . $storage_filter . "') && product_camera LIKE ('%" . $product_name . "%')";

    }else 

    if(isset($ram,$storage,$minimum_price, $maximum_price)){
        $product_name = $product_name;
        $ram_filter = implode("','", $ram);
        $storage_filter = implode("','", $storage);
        $query.= "AND 
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_ram IN('" . $ram_filter . "') && product_storage IN('" . $storage_filter . "') && product_brand LIKE ('%" . $product_name . "%') ||
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_ram IN('" . $ram_filter . "') && product_storage IN('" . $storage_filter . "') && product_storage LIKE ('%" . $product_name . "%') ||
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_ram IN('" . $ram_filter . "') && product_storage IN('" . $storage_filter . "') && product_name LIKE ('%" . $product_name . "%') || 
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_ram IN('" . $ram_filter . "') && product_storage IN('" . $storage_filter . "') && product_ram LIKE ('%" . $product_name . "%') || 
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_ram IN('" . $ram_filter . "') && product_storage IN('" . $storage_filter . "') && product_price LIKE ('%" . $product_name . "%') || 
         product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_ram IN('" . $ram_filter . "') && product_storage IN('" . $storage_filter . "') && product_camera LIKE ('%" . $product_name . "%')";

    }else
    
    if(isset($brand,$minimum_price, $maximum_price))
    {
    $brand_filter = implode("','", $brand);
    $query .= "AND
       product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "')  && product_brand LIKE ('%" . $product_name . "%') ||
       product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "')  && product_storage LIKE ('%" . $product_name . "%') ||
       product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "')  && product_name LIKE ('%" . $product_name . "%') || 
       product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "')  && product_ram LIKE ('%" . $product_name . "%') || 
       product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "')  && product_price LIKE ('%" . $product_name . "%') || 
       product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_brand IN('" . $brand_filter . "')  && product_camera LIKE ('%" . $product_name . "%')";
    
    }else

    if(isset($ram,$minimum_price, $maximum_price))
    {
    $ram_filter = implode("','", $ram);
        $query .= "AND
             product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_ram IN('" . $ram_filter . "')  && product_brand LIKE ('%" . $product_name . "%') ||
             product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_ram IN('" . $ram_filter . "')  && product_storage LIKE ('%" . $product_name . "%') ||
             product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_ram IN('" . $ram_filter . "')  && product_name LIKE ('%" . $product_name . "%') || 
             product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_ram IN('" . $ram_filter . "')  && product_ram LIKE ('%" . $product_name . "%') || 
             product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_ram IN('" . $ram_filter . "')  && product_price LIKE ('%" . $product_name . "%') || 
             product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' && product_ram IN('" . $ram_filter . "')  && product_camera LIKE ('%" . $product_name . "%')";
    }else

    if(isset($storage,$minimum_price, $maximum_price))
    {
    $storage_filter = implode("','", $storage);
    $query .= "AND
            product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' &&  product_storage IN('" . $storage_filter . "')  && product_brand LIKE ('%" . $product_name . "%') ||
            product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' &&  product_storage IN('" . $storage_filter . "')  && product_storage LIKE ('%" . $product_name . "%') ||
            product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' &&  product_storage IN('" . $storage_filter . "')  && product_name LIKE ('%" . $product_name . "%') || 
            product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' &&  product_storage IN('" . $storage_filter . "')  && product_ram LIKE ('%" . $product_name . "%') || 
            product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' &&  product_storage IN('" . $storage_filter . "')  && product_price LIKE ('%" . $product_name . "%') || 
            product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' &&  product_storage IN('" . $storage_filter . "')  && product_camera LIKE ('%" . $product_name . "%')";
    }else
    
    if(isset($minimum_price, $maximum_price,$product_name))
    {
    $query .= "AND
    product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' &&  product_brand LIKE ('%" . $product_name . "%') ||
    product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' &&  product_storage LIKE ('%" . $product_name . "%') ||
    product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' &&  product_name LIKE ('%" . $product_name . "%') || 
    product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' &&  product_ram LIKE ('%" . $product_name . "%') || 
    product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' &&  product_price LIKE ('%" . $product_name . "%') || 
    product_price BETWEEN '".$minimum_price."' AND '".$maximum_price."' &&  product_camera LIKE ('%" . $product_name . "%')";
    }
    
  return $query;
 }

 function count_all($minimum_price, $maximum_price, $brand, $ram, $storage,$product_name)
 {
  $query = $this->make_query($minimum_price, $maximum_price, $brand, $ram, $storage,$product_name);
  $data = $this->db->query($query);
  return $data->num_rows();
 }

 function fetch_data($limit, $start, $minimum_price, $maximum_price, $brand, $ram, $storage,$product_name)
 {
  $query = $this->make_query($minimum_price, $maximum_price, $brand, $ram, $storage,$product_name);

  $query .= ' LIMIT '.$start.', ' . $limit;

  $data = $this->db->query($query);

  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result_array() as $row)
   {
    $output .= 

    '<div class="product">
                    <svg xmlns="http://www.w3.org/2000/svg" class="like-svg" width="28" height="28" viewBox="0 0 20 16">
                        <path
                            d="M8.695 16.682C4.06 12.382 1 9.536 1 6.065 1 3.219 3.178 1 5.95 1c1.566 0 3.069.746 4.05 1.915C10.981 1.745 12.484 1 14.05 1 16.822 1 19 3.22 19 6.065c0 3.471-3.06 6.316-7.695 10.617L10 17.897l-1.305-1.215z"
                            fill="#ccc" class="_35Y7Yo" stroke="#FFF" fill-rule="evenodd" opacity=".9"></path>
                    </svg>
                    <div class="image">
                        <img src="'.base_url().'images/'. $row['product_image'] .'"><br>
                    </div>
                    <div class="details">
                        <div class="name" >'. $row['product_name'] .'</div>
                        <div><p>Price</p> ₹'. $row['product_price'] .'</div>
                        <div><p>Ram</p> '. $row['product_ram'] .' GB</div>
                        <div><p>Camera</p> '. $row['product_camera'].' MP</div>
                        <div><p>Storage</p> '. $row['product_storage'] .' GB</div>
                    </div>
                </div>';
   }
  }
  else
  {
   $output = '<h3>No Data Found</h3>';
  }
  return $output;
 }
}

?>