<!-- Start Contact Us Section -->
<div class="contact-us-section">
    <div class="body-content card px-4">
    <div class="row mt-4 pb-3">
        <div class="col-xm-12 col-md-4">
        <div class="items text-center mt-2">
            <div class="item">
            <div class="icon mb-2">
                <i class="fa fa-map-marker fa-3x text-primary" aria-hidden="true"></i>
            </div>
            <h5>Address</h5>
            <p>Boukadir ,National Road No 02 <br> opposite the court</p>
            </div>

            <div class="item">
            <div class="icon mb-2">
                <i class="fa fa-phone fa-3x text-primary" aria-hidden="true"></i>
            </div>
            <h5>Phone</h5>
            <p>0775805470</p>
            </div>

            <div class="item">
            <div class="icon mb-2">
                <i class="fa fa-envelope fa-3x text-primary" aria-hidden="true"></i>
            </div>
            <h5>Email</h5>
            <p>contact@internfinder.com</p>
            </div>
        </div>
        </div>
        <div class="col-xm-12 col-md-8">
        <div class="header-content mb-2">
            <h1 class="mb-2">Contact Us</h1>
            <p>
            In the event of any inquiries, please contact us
            </p>
        </div>
        <form action="" method="post">
            <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="example@gmail.com" id="email" name="email">
                @error('email')
                <small class="text-danger d-block">
                        {{ $message }}
                </small>
                @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Abdelkadir" id="name" name="name">
                @error('name')
                <small class="text-danger d-block">
                        {{ $message }}
                </small>
                @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                <label for="">Message</label>
                <textarea class="form-control @error('message') is-invalid @enderror" rows="5" name="message" id="message" 
                ></textarea>
                @error('message')
                <small class="text-danger d-block">
                        {{ $message }}
                </small>
                @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <a href="http://" class="btn btn-primary">Send</a>
            </div>
            </div>
        </form>
        </div>
    </div>

    </div>
</div>
   <!-- End Contact Us Section -->
   