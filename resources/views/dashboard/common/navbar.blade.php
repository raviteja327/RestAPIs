
<div class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{asset('images_kalai/logo_name.png')}}" width="200px" height="35px">
      &nbsp;&nbsp;
      <span class="fas fa-bars" id="side_menu_list"></span>
    </a>
    <div class="d-flex text-white">
      <h5>Welcome Back Mr.Ranjith</h5> &nbsp;
    </div>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>&nbsp;
      <button class="btn btn-danger" type="submit">Signout</button>
    </form>
    <a class="" href="#" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fas fa-2x fa-th" style="color: white;" data-bs-toggle="modal" data-bs-target="#side_menu"></span>
    </a>
  </div>
  
</div>
<div>
  
</div>




<div class="modal fade" id="side_menu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <input type="text" name="" placeholder="Search" id="">
        <button type="button btn-sm" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
         
          <div class="col-2">
            <div class="p-3 bg-light text-dark">
              <h5> USER MANAGEMENT</h5>
              <button class="btn btn-outline-success">Add</button>&nbsp;
              <button class="btn btn-success">View</button>
            </div>
          </div>
          <div class="col-2">
            <div class="p-3 bg-light text-dark">
              <h5> ACCOUNT MANAGEMENT</h5>
              <button class="btn btn-outline-success">Add</button>&nbsp;
              <button class="btn btn-success">View</button>
            </div>
          </div>

          <div class="col-4">
            <div class="p-3 bg-light text-dark">
              <h5> STORE MANAGEMENT</h5>
              <button class="btn btn-outline-success">ORDERS</button>&nbsp;
              <button class="btn btn-success">PRODUCTS</button>
              <a href="http://">POS</a>&nbsp;
              <a href="http://">ORDERS</a>
              <button class="btn btn-outline-success">COUPONS</button>&nbsp;<br/><br/>
              <button class="btn btn-success">PAYMENTS</button>&nbsp;
              <button class="btn btn-success">PRODUCT CATEGORIES</button>
            </div>
            
          </div>
        

        </div>
      </div>
    </div>
  </div>
</div>