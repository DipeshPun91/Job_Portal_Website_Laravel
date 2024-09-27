<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job Site</title>

    @vite(['resources/css/style.css', 'resources/js/main.js'])
  </head>
  <body>
    <!-- Header Section -->
    <header>
      <nav>
        <div class="logo">
          <img src="images/joblogo.jpg" alt="Logo" />
        </div>
        <ul>
          <li><a href="#top">Home</a></li>
          <li><a href="#features">Features</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        @if (Route::has('login'))
            <div class="log">
              @auth
                <a href="{{ url('/home') }}" class="log">Dashboard</a>
              @else
                <a href="{{ route('login') }}" class="log">Log in</a>

              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="Log">Register</a>
              @endif @endauth
            </div>
        @endif
      </nav>
      <h1>Job Portal Agency</h1>
      <p>
        Welcome to your gateway to endless career opportunities!
        <br>
        Explore a world of possibilities and take the next step in your professional journey with us. We're here to help you connect with the job of your dreams, matching your skills and aspirations with the perfect employment opportunities. Our platform streamlines the job search process, making it easier than ever to discover, apply, and secure your ideal job. Join us today and let's make your career aspirations a reality!
      </p>

      <a href="#contact" class="cta-button">Get Started</a>
    </header>

    <!-- Features Section -->
    <section id="features">
      <div>
        <h2>Key Features</h2>
        <div class="feature">
          <img src="images/feature1.webp" alt="Feature 1" />
          <h3>Search Jobs</h3>
          <p>
            Discover an extensive array of job opportunities that match your skills, experience, and career aspirations through our comprehensive job search feature. Our advanced search capabilities allow you to filter and refine your job hunt, ensuring you find the perfect positions that align with your goals. Say goodbye to endless scrolling and hello to efficient job discovery with our intuitive search tool. Find your dream job today and take the next step in your career journey.
          </p>
        </div>
        <div class="feature">
          <img src="images/feature2.webp" alt="Feature 2" />
          <h3>Add Jobs</h3>
          <p>
            Empower your organization's recruitment efforts by utilizing our user-friendly job posting feature. Whether you're a small business or a large corporation, our platform makes it a breeze to list job openings and connect with potential candidates. With our intuitive interface, you can provide detailed job descriptions, requirements, and application instructions. Reach a broader audience, attract top talent, and streamline your hiring process with ease. Post job listings effortlessly and watch your talent pool grow.
          </p>
        </div>
        <div class="feature">
          <img src="images/feature3.webp" alt="Feature 3" />
          <h3>Apply Jobs</h3>
          <p>
            Take the stress out of job applications and simplify the way you connect with employers through our job application feature. Our platform offers a seamless experience for candidates seeking employment. Easily submit your resume, cover letter, and other relevant documents to potential employers with just a few clicks. Receive real-time updates on your application status, and stay organized throughout your job search journey. Our application tool ensures you present your best self to prospective employers and increases your chances of securing your desired position.
          </p>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about">
      <div>
        <h2>About Us</h2>
        <p>
          Welcome to our world of passion and dedication to helping individuals and businesses thrive in the ever-evolving job market. At our web site, we believe that every career has the potential to flourish, and we're here to make that happen for you.
         <br>
          With years of experience and a commitment to excellence, we've become industry leaders in connecting job seekers with their dream opportunities and assisting employers in finding the perfect talent. Our mission is to empower you with the tools, resources, and support you need to succeed.
          <br>
          Join us on this exciting journey as we work together to shape brighter futures and build stronger communities through meaningful employment. Let's write the next chapter of your success story together.
        </p>
        <img src="images/about.webp" alt="About Us" />
      </div>
    </section>
    
    </section>

    <!-- Contact Section -->
    <section id="contact">
      <div>
        <h2>Contact Us</h2>
        <p>
          We're here to assist you in any way we can. Whether you have questions, feedback, or need support, please don't hesitate to reach out to our dedicated team. Your inquiries are important to us, and we'll respond as promptly as possible to address your needs.
          <br>
          You can contact us via email, phone, or by visiting our office during business hours. Our team is committed to providing you with excellent service, and we look forward to hearing from you soon.
        </p>
        <form>
          <input type="text" name="name" placeholder="Your Name" required />
          <input type="email" name="email" placeholder="Your Email" required />
          <textarea name="message" placeholder="Your Message" required></textarea>
          <button type="submit">Send Message</button>
        </form>
      </div>
    </section>

    <!-- Footer Section -->
    <footer>
      <p>&copy; 2023 Job Site. All rights reserved.</p>
    </footer>
  </body>
</html>
