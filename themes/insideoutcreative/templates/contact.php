<?php
/**
 * Template Name: Contact
 */
get_header(); ?>
<style>
    .hero-content,.hero-img{
    display: none;
}
section.hero {
    display: none;
}
</style>
<section class="pt-5 pb-5 position-relative" style="overflow:hidden;">
<?php if(has_post_thumbnail()){
    the_post_thumbnail('full',array('class'=>'bg-img position-absolute w-100 h-100'));
} else { 
echo wp_get_attachment_image(26,'full','',['class'=>'bg-img position-absolute w-100 h-100']); 
} ?>
    <div class="container pb-4">
        <div class="row justify-content-center">
            <div class="col-md-9 pt-5 pb-5 p-4">
            <div class="content">
            <div class="position-absolute bg-white" style="opacity:.75;width:100%;height:100%;top:0;left:0;"></div>
            <div class="position-relative">
<?php if(have_posts()) : while(have_posts()): the_post(); the_content(); endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
<?php endif; 

$message_sent = false;
    if(isset($_POST['email']) && $_POST['email'] != '' ){
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

            // submit the form
            $userEmail = $_POST['email'];
            $firstName = $_POST['firstName'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
            // $math = $_POST['math'];
            // $messageSubject = $_POST['subject'];
            // $message = $_POST['message'];


$to = "efrain@insideoutfocus.com";
            
$headers = "From: info@insideoutfocus.com \r\n";
$headers .= "Reply-To: info@insideoutfocus.com \r\n";
// $headers .= "CC: garrett@insideoutfocus.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


$body = '<table style="background-color: #f7f7f7; width: 100%;">';
$body .= '<tbody>';
$body .= '<tr>';
$body .= '<td>';

// start of table for logo
$body .= '<table style="padding-top:20px;padding-bottom: 20px;margin:auto;">';
$body .= '<tbody>';
$body .= '<tr>';
$body .= '<td style="text-align: center;"><img src="' . home_url() . '/wp-content/uploads/2022/07/Morgan-Birge-Logo-Black.png" alt="Logo" width="200px" height="auto"/></td>';
$body .= '</tr>';
$body .= '</tbody>';
$body .= '</table>';
// end of table for logo

// start of body
$body .= '<table style="margin: auto; padding: 20px; width: 100%; max-width: 600px;background-color:white;">';
$body .= '<tbody>';

$body .= '<tr>';
$body .= '<td><p style="padding-left:10px;">Email: <br>' . $userEmail . '</p></td>';
$body .= '</tr>';

$body .= '<tr>';
$body .= '<td><p style="padding-left:10px;">From: <br>' . $firstName . '</p></td>';
$body .= '</tr>';

$body .= '<tr>';
$body .= '<td><p style="padding-left:10px;">Phone: <br>' . $phone . '</p></td>';
$body .= '</tr>';

$body .= '<tr>';
$body .= '<td><p style="padding-left:10px;">Message: <br>' . $message . '</p></td>';
$body .= '</tr>';

$body .= '<tr>';
$body .= '<td>';
$body .= '<h4 style="padding-top:25px;padding-left:10px;margin-bottom:0;">Congrats on your new website lead!</h4>';
$body .= '</td>';
$body .= '</tr>';

$body .= '<tr>';
$body .= '<td>';
$body .= '<p style="padding-left:10px;margin-top:0;">Have questions about the form submission or the website?
Reach out to your web support at <a href="mailto:garrett@insideoutfocus.com">garrett@insideoutfocus.com</a></p>';
$body .= '</td>';
$body .= '</tr>';




$body .= '</tbody>';
$body .= '</table>';
// end of body


// necessary so the table below does get styled
$body .= '<table style="margin: auto; padding: 20px; width: 100%; max-width: 600px;text-align:center;">';
$body .= '<tbody>';
$body .= '<tr>';
$body .= '<td>';
$body .= '</td>';
$body .= '</tr>';
$body .= '<tr>';
$body .= '</tr>';
$body .= '</tbody>';
$body .= '</table>';
// necessary so the table below does get styled

// start of footer
$body .= '<table style="margin: auto; padding: 20px; width: 100%; max-width: 600px;text-align:center;">';
$body .= '<tbody>';
$body .= '<tr>';
$body .= '<td>';

$body .= '</td>';
$body .= '</tr>';


$body .= '</tbody>';
$body .= '</table>';
// end of footer

$body .= '</td>';
$body .= '</tr>';
$body .= '</tbody>';
$body .= '</table>';



            mail($to,'Website Lead!!! ' . $firstName .'', $body, $headers);

            $message_sent = true;


            
        }
    }

    if($message_sent){
        echo '<section class="pt-5 pb-5">';
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-12">';

        echo '<h2>Thank you for getting in touch, ' . $firstName . '</h2>';
        echo '<p>The form has been successfully submitted. We\'ll respond shortly.</p>';
        echo '<a href="/" class="bg-accent btn text-white"><- Go Back Home</a>';
        
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
    } else {
        
echo '<form id="contact-form" class="" action="' . home_url() . '/contact/" method="POST">';

echo '<div class="container">';
echo '<div class="row">';

echo '<div class="col-lg-4 col-6">';
echo '<label for="firstName">First Name</label><br>';
echo '<input type="text" name="firstName" placeholder="" style="" required>';
echo '</div>';

echo '<div class="col-lg-4 col-6">';
echo '<label for="email">Email</label><br>';
echo '<input type="email" name="email" placeholder="" style="" required>';
echo '</div>';

echo '<div class="col-lg-4">          ';
echo '<label for="phone">Phone Number</label><br>';
echo '<input type="tel" name="phone" placeholder="" style="" required>';
echo '</div>';

echo '<div class="col-12">          ';
echo '<label for="message">Message</label><br>';
echo '<textarea name="message" id="" cols="30" rows="3"></textarea>';
echo '</div>';

echo '<div class="col-12 pt-4">';
echo '<button style="" type="submit">Send Message</button>';
echo '</div>';

echo '</div>';
echo '</div>';
              
echo '</form>';


    }

?>
</div>
            </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>