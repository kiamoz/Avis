<?php $page = "contact" ; include 'header.php'; ?>


<div id="content" class="no-top no-bottom">
    
     <section class="no-top" aria-label="map-container">
                <div id="map"></div>
            </section>
    
    
            <section id="side-01-about" class="side-bg no-padding mt80 mt-sm-0" data-bgcolor="#1d1e1f">
                <div class="image-container col-md-5 col-md-offset-7 pull-left" data-delay="0"></div>

                <div class="container">
                    <div class="row">
                        <div class="inner-padding">
                            <div class="col-md-6" data-animation="fadeInRight" data-delay="200">
                             
                                 <h2>305 North Coast Hwy, Laguna Beach, CA 92651</h2>
                                <p>
                                    
                                  


 

                                </p> 
                                
                              
                        <h3>Send ME Message</h3>
                        <form name="contactForm" id='contact_form' method="post" action='email.php'>
                            <div class="row">
                                <div class="col-md-4">
                                    <div id='name_error' class='error'>Please enter your name.</div>
                                    <div>
                                        <input type='text' name='name' id='name' class="form-control" placeholder="Your Name">
                                    </div>

                                    <div id='email_error' class='error'>Please enter your valid E-mail ID.</div>
                                    <div>
                                        <input type='text' name='email' id='email' class="form-control" placeholder="Your Email">
                                    </div>

                                    <div id='phone_error' class='error'>Please enter your phone number.</div>
                                    <div>
                                        <input type='text' name='phone' id='phone' class="form-control" placeholder="Your Phone">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div id='message_error' class='error'>Please enter your message.</div>
                                    <div>
                                        <textarea name='message' id='message' class="form-control" placeholder="Your Message"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <p id='submit'>
                                        <input type='submit' id='send_message' value='Submit Form' class="btn btn-line">
                                    </p>
                                    <div id='mail_success' class='success'>Your message has been sent successfully.</div>
                                    <div id='mail_fail' class='error'>Sorry, error occured this time sending your message.</div>
                                </div>
                            </div>
                        </form>
                    
 

                                

                            </div>
                            



                            <div class="clearfix"></div>


                        </div>
                    </div>
                </div>
            </section>

        </div>

         <?php include 'footer.php' ?>
