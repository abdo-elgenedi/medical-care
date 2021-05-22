@extends('layouts.doctor')
@section('title') Dashboard @endsection
@section('header')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Appointments</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
@endsection

@section('content')

    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="appointments">

            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">Richard Wilson</a></h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i> 14 Nov 2019, 10.00 AM</h5>
                            <h5><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5>
                            <h5><i class="fas fa-envelope"></i> richard@example.com</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i> +1 923 782 4575</h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                        <i class="far fa-eye"></i> View
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
            <!-- /Appointment List -->

            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient1.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">Charlene Reed </a></h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i> 12 Nov 2019, 5.00 PM</h5>
                            <h5><i class="fas fa-map-marker-alt"></i> North Carolina, United States</h5>
                            <h5><i class="fas fa-envelope"></i> charlenereed@example.com</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i> +1 828 632 9170</h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                        <i class="far fa-eye"></i> View
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
            <!-- /Appointment List -->

            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient2.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">Travis Trimble</a></h3>

                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i> 11 Nov 2019, 8.00 PM</h5>
                            <h5><i class="fas fa-map-marker-alt"></i> Maine, United States</h5>
                            <h5><i class="fas fa-envelope"></i> travistrimble@example.com</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i> +1 207 729 9974</h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                        <i class="far fa-eye"></i> View
                    </a>

                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
            <!-- /Appointment List -->

            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient3.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">Carl Kelly</a></h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i> 9 Nov 2019, 9.00 AM</h5>
                            <h5><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5>
                            <h5><i class="fas fa-envelope"></i> carlkelly@example.com</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i> +1 260 724 7769</h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                        <i class="far fa-eye"></i> View
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
            <!-- /Appointment List -->

            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient4.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">Michelle Fairfax</a></h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i> 9 Nov 2019, 1.00 PM</h5>
                            <h5><i class="fas fa-map-marker-alt"></i> Indiana, United States</h5>
                            <h5><i class="fas fa-envelope"></i> michellefairfax@example.com</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i> +1 504 368 6874</h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                        <i class="far fa-eye"></i> View
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
            <!-- /Appointment List -->

            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient5.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">Gina Moore</a></h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i> 8 Nov 2019, 3.00 PM</h5>
                            <h5><i class="fas fa-map-marker-alt"></i> Florida, United States</h5>
                            <h5><i class="fas fa-envelope"></i> ginamoore@example.com</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i> +1 954 820 7887</h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                        <i class="far fa-eye"></i> View
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
            <!-- /Appointment List -->

            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient6.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">Elsie Gilley</a></h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i> 6 Nov 2019, 9.00 AM</h5>
                            <h5><i class="fas fa-map-marker-alt"></i> Kentucky, United States</h5>
                            <h5><i class="fas fa-envelope"></i> elsiegilley@example.com</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i> +1 315 384 4562</h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                        <i class="far fa-eye"></i> View
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
            <!-- /Appointment List -->

            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient7.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">Joan Gardner</a></h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i> 5 Nov 2019, 12.00 PM</h5>
                            <h5><i class="fas fa-map-marker-alt"></i> California, United States</h5>
                            <h5><i class="fas fa-envelope"></i> joangardner@example.com</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i> +1 707 2202 603</h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                        <i class="far fa-eye"></i> View
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
            <!-- /Appointment List -->

            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient8.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">Daniel Griffing</a></h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i> 5 Nov 2019, 7.00 PM</h5>
                            <h5><i class="fas fa-map-marker-alt"></i> New Jersey, United States</h5>
                            <h5><i class="fas fa-envelope"></i> danielgriffing@example.com</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i> +1 973 773 9497</h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                        <i class="far fa-eye"></i> View
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
            <!-- /Appointment List -->

            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient9.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">Walter Roberson</a></h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i> 4 Nov 2019, 10.00 AM</h5>
                            <h5><i class="fas fa-map-marker-alt"></i> Florida, United States</h5>
                            <h5><i class="fas fa-envelope"></i> walterroberson@example.com</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i> +1 850 358 4445</h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                        <i class="far fa-eye"></i> View
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
            <!-- /Appointment List -->

            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient10.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">Robert Rhodes</a></h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i> 4 Nov 2019, 11.00 AM</h5>
                            <h5><i class="fas fa-map-marker-alt"></i> California, United States</h5>
                            <h5><i class="fas fa-envelope"></i> robertrhodes@example.com</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i> +1 858 259 5285</h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                        <i class="far fa-eye"></i> View
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
            <!-- /Appointment List -->

            <!-- Appointment List -->
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="assets/img/patients/patient11.jpg" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                        <h3><a href="patient-profile.html">Harry Williams</a></h3>
                        <div class="patient-details">
                            <h5><i class="far fa-clock"></i> 3 Nov 2019, 6.00 PM</h5>
                            <h5><i class="fas fa-map-marker-alt"></i> Colorado, United States</h5>
                            <h5><i class="fas fa-envelope"></i> harrywilliams@example.com</h5>
                            <h5 class="mb-0"><i class="fas fa-phone"></i> +1 303 607 7075</h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="#" class="btn btn-sm bg-info-light" data-toggle="modal" data-target="#appt_details">
                        <i class="far fa-eye"></i> View
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>
            <!-- /Appointment List -->

        </div>
    </div>
    </div>

    <!-- Appointment Details Modal -->
    <div class="modal fade custom-modal" id="appt_details">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Appointment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="info-details">
                        <li>
                            <div class="details-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="title">#APT0001</span>
                                        <span class="text">21 Oct 2019 10:00 AM</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right">
                                            <button type="button" class="btn bg-success-light btn-sm" id="topup_status">Completed</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="title">Status:</span>
                            <span class="text">Completed</span>
                        </li>
                        <li>
                            <span class="title">Confirm Date:</span>
                            <span class="text">29 Jun 2019</span>
                        </li>
                        <li>
                            <span class="title">Paid Amount</span>
                            <span class="text">$450</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Details Modal -->
@endsection