<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Hello,
                        <span>Welcome Here</span>
                    </h1>
                </div>
            </div>
        </div>

        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo ADMIN_BASE_URL; ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="user-profile">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="user-photo m-b-30">
                                        <img class="img-fluid" src="<?php echo IMAGE_URL . '/12.png'; ?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="user-profile-name"><?php echo $_SESSION['USER_SESSION']; ?></div>
                                    <div class="user-job-title">Fullstack Dev</div>
                                    <div class="ratings">
                                        <h4>Ratings</h4>
                                        <div class="rating-star">
                                            <span>8.9</span>
                                            <i class="fas fa-star color-primary"></i>
                                            <i class="fas fa-star color-primary"></i>
                                            <i class="fas fa-star color-primary"></i>
                                            <i class="fas fa-star color-primary"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="user-send-message">
                                        <button class="btn btn-primary btn-addon" type="button">
                                            <i class="ti-email"></i>Send Message</button>
                                    </div>
                                    <div class="custom-tab user-profile-tab">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="1">
                                                <div class="contact-information">
                                                    <h4>Contact information</h4>
                                                    <div class="phone-content">
                                                        <span class="contact-title">Phone:</span>
                                                        <span class="phone-number">+0696969696</span>
                                                    </div>
                                                    <div class="address-content">
                                                        <span class="contact-title">Address:</span>
                                                        <span class="mail-address">280 An Dương Vương</span>
                                                    </div>
                                                    <div class="email-content">
                                                        <span class="contact-title">Email:</span>
                                                        <span class="contact-email">dapamu333@gmail.com</span>
                                                    </div>
                                                    <div class="website-content">
                                                        <span class="contact-title">Website:</span>
                                                        <span class="contact-website">none</span>
                                                    </div>
                                                    <div class="skype-content">
                                                        <span class="contact-title">Github:</span>
                                                        <span class="contact-skype"><a href="https://github.com/Tue666">https://github.com/Tue666</a></span>
                                                    </div>
                                                </div>
                                                <div class="basic-information">
                                                    <h4>Basic information</h4>
                                                    <div class="birthday-content">
                                                        <span class="contact-title">Birthday:</span>
                                                        <span class="birth-date">September 2, 2001 </span>
                                                    </div>
                                                    <div class="gender-content">
                                                        <span class="contact-title">Gender:</span>
                                                        <span class="gender">Male</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="footer d-flex justify-content-center align-items-center">
                    <p class="text-center">Bản quyền <?php echo date("Y"); ?> thuộc về Đoàn - Hội khoa Công nghệ Thông tin</p>
                </div>
            </div>
        </div>
    </section>
</div>