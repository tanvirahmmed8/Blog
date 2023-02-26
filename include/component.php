<?php 
class Component{
    public function alert($msg,$alert){
        echo'<div class="alert alert-'.$alert.' alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    public function error(){
      $url ="'https://www.lifewire.com/thmb/auk-givypeTY383aFHJnpl6fQSU=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/404-not-found-error-explained-2622936-Final-fde7be1b7e2e499c9f039d97183e7f52.jpg'";
      echo'<div class="row">
      <div class="col-12 col-md-12 col-sm-12">
          <div class="card pt-5 pb-5" style="background-image: url('.$url.'); background-size :cover; background-repeat: no-repeat; height:96vh;">
              <div class="card-body text-center justify-content-center pt-5 pb-5 my-auto">
                  <div class="">
                  </div>
              </div>
          </div>
      </div>
     </div>';
    }
}
$component = new Component;
?>