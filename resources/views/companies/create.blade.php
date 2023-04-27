
                    <form id="companyForm">
                    {{ csrf_field() }}
                    <h5 class="text-center">Add Company</h5>
                        <div class="row g-gs">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name"> Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="email"> Email</label>
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="email">Logo</label>
                                    <div class="form-control-wrap">
                                        <input type="file" class="form-control" id="logo" placeholder="logo" name="image">
                                    </div>
                                </div>
                            </div>
                            
                           <button type="submit" class="btn btn-success">save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
  $('#companyForm').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: "{{route('companies.store')}}", // Replace with the URL of your server route that invokes the store function
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
        success: function(response) {
            alert(response.company); // Display the success message returned from the server
        },
        error: function(xhr, status, error) {
            console.log(error); // Display any errors that occurred during the AJAX request
        }
    });
});
    </script>


