<?php
session_start();
include_once('../includes/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>


    <main>
        <section id="home" class="hero">
            <div class="hero-content">
                <h1>Welcome to Your Future</h1>
                <p>Where innovation meets creativity. Build your dream website with us.</p>
                <a href="#services" class="cta-btn">Get Started</a>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about">
            <div class="container">
                <h2>About Us</h2>
                <p>We are a team of passionate web developers dedicated to crafting innovative and high-performance web solutions. From sleek designs to robust functionality, we provide comprehensive web services tailored to your needs.</p>
                <div class="features">
                    <div class="feature-item">
                        <h3>Innovative Solutions</h3>
                        <p>Cutting-edge technology to deliver modern and functional designs.</p>
                    </div>
                    <div class="feature-item">
                        <h3>Experienced Team</h3>
                        <p>Over 10 years of experience in web development and design.</p>
                    </div>
                    <div class="feature-item">
                        <h3>Customer-Centric</h3>
                        <p>Your satisfaction is our top priority. We work closely with you to meet your expectations.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="services">
            <div class="container">
                <h2>Our Services</h2>
                <div class="service-list">
                    <div class="service-item">
                        <h3>Custom Web Design</h3>
                        <p>Beautifully crafted websites that represent your brand.</p>
                    </div>
                    <div class="service-item">
                        <h3>Mobile Optimization</h3>
                        <p>Responsive designs that work flawlessly on any device.</p>
                    </div>
                    <div class="service-item">
                        <h3>SEO Services</h3>
                        <p>Boost your online visibility and drive organic traffic to your site.</p>
                    </div>
                    <div class="service-item">
                        <h3>Content Management</h3>
                        <p>Seamless integration with CMS platforms for easy updates.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials">
            <div class="container">
                <h2>What Our Clients Say</h2>
                <div class="testimonial-list">
                    <div class="testimonial-item">
                        <p>"The team exceeded my expectations! They built a website that's not only functional but also stunning."</p>
                        <h4>- Sarah L., Business Owner</h4>
                    </div>
                    <div class="testimonial-item">
                        <p>"Their attention to detail and dedication to my project were outstanding. Highly recommended!"</p>
                        <h4>- John D., Entrepreneur</h4>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact">
            <div class="container">
                <h2>Contact Us</h2>
                <p>We're here to help! Reach out to us for any inquiries or project discussions.</p>
                <form action="#" method="POST">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </section>
    </main>

<!-- <script>
document.addEventListener('DOMContentLoaded', () => {
    const warningTime = 540000; // 9 menit dalam milidetik
    const logoutTime = 600000; // 10 menit dalam milidetik

    let warningTimer = setTimeout(() => {
        alert("Anda akan logout otomatis dalam 1 menit karena tidak ada aktivitas.");
    }, warningTime);

    let logoutTimer = setTimeout(() => {
        window.location.href = '/modules/auth/logout.php';
    }, logoutTime);

    // Reset timer jika ada aktivitas pengguna
    document.addEventListener('mousemove', resetTimers);
    document.addEventListener('keydown', resetTimers);

    function resetTimers() {
        clearTimeout(warningTimer);
        clearTimeout(logoutTimer);
        warningTimer = setTimeout(() => {
            alert("Anda akan logout otomatis dalam 1 menit karena tidak ada aktivitas.");
        }, warningTime);
        logoutTimer = setTimeout(() => {
            window.location.href = '/modules/auth/logout.php';
        }, logoutTime);
    }
});
</script> -->

<?php
// meng-include footer
include_once('../includes/footer.php');
?>
</body>
</html>
