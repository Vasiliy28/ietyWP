<?php
/**
 * Created by PhpStorm.
 * User: vasy
 * Date: 25.01.16
 * Time: 11:14
 */
?>
<section id="<?php echo the_ID(); ?>" class="wrapperContactUs <?php echo (the_field('background_post'));  ?> " id="contactUs">

    <div class="container">
        <div class="contactUs">
            <header>
                <h1><?php the_title(); ?></h1>
                <p><?php the_field('header_post')?></p>
            </header>
            <article class="contactUsContent">
                <div class="col-sm-12 col-sm-offset-0 col-md-offset-1 col-md-2">
                    <div class="contactUsBoxes clearfix">
                        <div class="contactUsBox ">
                            <div class="contactUsIcon"><i class="fa fa-map-marker"></i></div>
                            <h4>Address</h4>
                            <p>771 Mercer Rd
                                Butler, PA 16001-1107</p>
                        </div>
                        <div class="contactUsBox ">
                            <div class="contactUsIcon"><i class="fa fa-mobile"></i></div>
                            <h4>Phone:</h4>
                            <p>+7 999 99 99 99</p>
                        </div>
                        <div class="contactUsBox ">
                            <div class="contactUsIcon"><i class="fa fa-hand-pointer-o"></i></div>
                            <h4>WebSite:</h4>
                            <a href="#">www.etti.com</a>
                        </div>
                    </div>


                </div>
                <div class="col-sm-offset-0 col-sm-12 col-md-offset-3 col-md-6 ">
                   <form class="contactUsForm form-horizontal hid">
                       <!-- Hidden Required Fields -->
                       <input type="hidden" name="project_name" value="Site Name">
                       <input type="hidden" name="admin_email" value="<?php the_field('e-mail')?>">
                       <input type="hidden" name="form_subject" value="Form Subject">
                       <!-- END Hidden Required Fields -->

                        <fieldset>
                            <div class="form-group">
                                <div class="input" id="input-1">
                                    <input class="inputField" type="text" name="Name" requiredid="input1">
                                    <label class="inputLabel" for="input1">
                                        <span class="inputLabelContent" data-content="Name">Frequency</span>
                                    </label>
                                    <svg class="inputGraphic" width="300%" height="100%" viewBox="0 0 1200 60"
                                         preserveAspectRatio="none">

                                        <path d="M1200,9c0,0-305.005,0-401.001,0C733,9,675.327,4.969,598,4.969C514.994,4.969,449.336,9,400.333,9C299.666,9,0,9,0,9v43c0,0,299.666,0,400.333,0c49.002,0,114.66,3.484,197.667,3.484c77.327,0,135-3.484,200.999-3.484C894.995,52,1200,52,1200,52V9z"/>
                                    </svg>


                                </div>
                                <div class="input" id="input-2">
                                    <input class="inputField" type="text" name="E-mail" required id="inputText-2">
                                    <label class="inputLabel" for="inputText-2">
                                        <span class="inputLabelContent" data-content="Name">Frequency</span>
                                    </label>
                                    <svg class="inputGraphic" width="300%" height="100%" viewBox="0 0 1200 60"
                                         preserveAspectRatio="none">
                                        <path d="M1200,9c0,0-305.005,0-401.001,0C733,9,675.327,4.969,598,4.969C514.994,4.969,449.336,9,400.333,9C299.666,9,0,9,0,9v43c0,0,299.666,0,400.333,0c49.002,0,114.66,3.484,197.667,3.484c77.327,0,135-3.484,200.999-3.484C894.995,52,1200,52,1200,52V9z"/>
                                    </svg>
                                </div>
                                <div class="text" id="text-1">
                                    <textarea class="inputField" type="text" name="Massege" rows="2" id="inputText-1"></textarea>

                                    <label class="inputLabel" for="inputText-1">
                                        <span class="inputLabelContent" data-content="Name">name</span>
                                    </label>
                                    <svg class="inputGraphic" width="300%" height="100%" viewBox="0 0 1200 60"
                                         preserveAspectRatio="none">
                                        <path d="M1200,9c0,0-305.005,0-401.001,0C733,9,675.327,4.969,598,4.969C514.994,4.969,449.336,9,400.333,9C299.666,9,0,9,0,9v43c0,0,299.666,0,400.333,0c49.002,0,114.66,3.484,197.667,3.484c77.327,0,135-3.484,200.999-3.484C894.995,52,1200,52,1200,52V9z"/>
                                    </svg>

                                </div>
                            </div>
                            <div class="form-group" >
                                <button class="buttonContactUs" data-text="Submit"><span>Submit</span></button>

                            </div>
                        </fieldset>
                    </form>


                </div>

            </article>

        </div>

    </div>
</section>
