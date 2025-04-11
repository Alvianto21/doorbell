@if (session()->has('success'))
    <div class="alert alert-warning alert-dismissible small col-lg-8" role="alert">          
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
        <h5><i class="icon fas fa-exclamation-triangle" ></i> Alert!</h5>        
        {{ session('success') }}       
    </div>
@endif