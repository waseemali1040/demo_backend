


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">


                    <form action="/kit/public/upload" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" class="form-control" name="img">
                        <input type="submit" class="form-control" value="upload">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

