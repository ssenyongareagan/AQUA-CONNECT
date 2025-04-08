<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AQUA | Customer Portal</title>
    <style>
        :root {
            /* AQUA brand colors */
            --primary-color: #0072CE;
            --primary-hover: #005BB0;
            --secondary-color: #00A4E4;
            --accent-color: #00BEAC;
            --error-color: #E53935;
            --success-color: #43A047;
            
            /* Neutral colors */
            --text-primary: #212B36;
            --text-secondary: #637381;
            --border-color: #DCE0E4;
            --bg-light: #F8FAFC;
            --white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-primary);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            max-width: 1440px;
            margin: 0 auto;
        }

        /* Header Styles */
        .header {
            padding: 24px 40px;
            display: flex;
            justify-content: center;
        }

        .logo {
            height: 32px;
            font-weight: bold;
            font-size: 24px;
            color: var(--primary-color);
        }

        /* Main Login Container */
        .login-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 24px;
        }

        .login-card {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.05);
            padding: 40px;
            width: 100%;
            max-width: 440px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-header h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-primary);
        }

        .login-header p {
            font-size: 14px;
            color: var(--text-secondary);
        }

        /* Form Elements */
        .login-form {
            margin-bottom: 24px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            color: var(--text-primary);
        }

        .password-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .forgot-password {
            font-size: 12px;
            color: var(--primary-color);
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .input-wrapper {
            position: relative;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 12px 16px;
            padding-right: 40px;
            font-size: 14px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background-color: var(--white);
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 114, 206, 0.15);
        }

        input::placeholder {
            color: var(--text-secondary);
            opacity: 0.7;
        }

        .input-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            display: flex;
            align-items: center;
        }

        .toggle-password {
            cursor: pointer;
        }

        .error-message {
            display: block;
            color: var(--error-color);
            font-size: 12px;
            margin-top: 6px;
        }

        /* Checkbox */
        .form-checkbox {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .form-checkbox input[type="checkbox"] {
            margin-right: 8px;
            width: 16px;
            height: 16px;
            accent-color: var(--primary-color);
        }

        .form-checkbox label {
            font-size: 14px;
            margin-bottom: 0;
        }

        /* Buttons */
        .btn-primary {
            width: 100%;
            padding: 14px 24px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        /* Divider */
        .login-divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 24px 0;
        }

        .login-divider::before,
        .login-divider::after {
            content: '';
            flex: 1;
            border-top: 1px solid var(--border-color);
        }

        .login-divider span {
            padding: 0 16px;
            font-size: 14px;
            color: var(--text-secondary);
        }

        /* SSO Buttons */
        .sso-options {
            margin-bottom: 24px;
        }

        .btn-sso {
            width: 100%;
            padding: 12px 24px;
            background-color: white;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            transition: background-color 0.2s, border-color 0.2s;
        }

        .btn-sso:hover {
            background-color: var(--bg-light);
            border-color: var(--text-secondary);
        }

        /* Registration Prompt */
        .register-prompt {
            text-align: center;
            font-size: 14px;
            color: var(--text-secondary);
        }

        .register-prompt a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .register-prompt a:hover {
            text-decoration: underline;
        }

        /* Footer */
        .footer {
            padding: 24px 40px;
            text-align: center;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 24px;
            margin-bottom: 16px;
        }

        .footer-links a {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 14px;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .copyright {
            font-size: 12px;
            color: var(--text-secondary);
        }

        .loading-spinner {
            animation: rotate 1.5s linear infinite;
        }
        
        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        
        .login-error {
            background-color: rgba(229, 57, 53, 0.1);
            color: var(--error-color);
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 14px;
            text-align: center;
        }

        /* Responsive Styles */
        @media (max-width: 576px) {
            .login-card {
                padding: 24px;
                border-radius: 8px;
            }
            
            .header {
                padding: 16px;
            }
            
            .footer {
                padding: 16px;
            }
            
            .footer-links {
                flex-direction: column;
                gap: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">AQUA</div>
        </header>
        
        <main class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <h1>Customer Portal</h1>
                    <p>Access your AQUA services and support</p>
                </div>
                
                <form id="loginForm" class="login-form">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrapper">
                            <input type="email" id="email" name="email" placeholder="you@company.com" required>
                        </div>
                        <span id="emailError" class="error-message"></span>
                    </div>
                    
                    <div class="form-group">
                        <div class="password-label">
                            <label for="password">Password</label>
                            <a href="#" class="forgot-password">Forgot password?</a>
                        </div>
                        <div class="input-wrapper">
                            <input type="password" id="password" name="password" placeholder="••••••••" required>
                            <span class="input-icon toggle-password" id="togglePassword">👁️</span>
                        </div>
                        <span id="passwordError" class="error-message"></span>
                    </div>
                    
                    <div class="form-checkbox">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Keep me signed in</label>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" id="loginButton" class="btn-primary">
                            <span>Sign In</span>
                        </button>
                    </div>
                </form>
                
                <div class="login-divider">
                    <span>Or</span>
                </div>
                
                <div class="sso-options">
                    <button class="btn-sso btn-sso-azure">
                        Sign in with Microsoft
                    </button>
                </div>
                
                <div class="register-prompt">
                    <p>Don't have an account? <a href="#">Contact your account manager</a></p>
                </div>
            </div>
        </main>
        
        <footer class="footer">
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Support</a>
            </div>
            <div class="copyright">
                <p>&copy; 2025 AQUA. All rights reserved.</p>
            </div>
        </footer>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const loginForm = document.getElementById('loginForm');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');
            const togglePassword = document.getElementById('togglePassword');
            const loginButton = document.getElementById('loginButton');
            
            // Toggle password visibility
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                togglePassword.textContent = type === 'text' ? '🔒' : '👁️';
            });
            
            // Input validation
            function validateEmail(email) {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }
            
            function validatePassword(password) {
                return password.length >= 8;
            }
            
            emailInput.addEventListener('blur', function() {
                if (emailInput.value && !validateEmail(emailInput.value)) {
                    emailError.textContent = 'Please enter a valid email address';
                    emailInput.style.borderColor = 'var(--error-color)';
                } else {
                    emailError.textContent = '';
                    emailInput.style.borderColor = 'var(--border-color)';
                }
            });
            
            passwordInput.addEventListener('blur', function() {
                if (passwordInput.value && !validatePassword(passwordInput.value)) {
                    passwordError.textContent = 'Password must be at least 8 characters';
                    passwordInput.style.borderColor = 'var(--error-color)';
                } else {
                    passwordError.textContent = '';
                    passwordInput.style.borderColor = 'var(--border-color)';
                }
            });
            
            // Form submission
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Reset error messages
                emailError.textContent = '';
                passwordError.textContent = '';
                emailInput.style.borderColor = 'var(--border-color)';
                passwordInput.style.borderColor = 'var(--border-color)';
                
                // Validate form fields
                let isValid = true;
                
                if (!emailInput.value) {
                    emailError.textContent = 'Email is required';
                    emailInput.style.borderColor = 'var(--error-color)';
                    isValid = false;
                } else if (!validateEmail(emailInput.value)) {
                    emailError.textContent = 'Please enter a valid email address';
                    emailInput.style.borderColor = 'var(--error-color)';
                    isValid = false;
                }
                
                if (!passwordInput.value) {
                    passwordError.textContent = 'Password is required';
                    passwordInput.style.borderColor = 'var(--error-color)';
                    isValid = false;
                } else if (!validatePassword(passwordInput.value)) {
                    passwordError.textContent = 'Password must be at least 8 characters';
                    passwordInput.style.borderColor = 'var(--error-color)';
                    isValid = false;
                }
                
                if (isValid) {
                    // Show loading state
                    loginButton.disabled = true;
                    loginButton.innerHTML = `<span>Signing In...</span>`;
                    
                    // Simulate API call
                    setTimeout(function() {
                        // For demo, simply redirect or show success
                        alert('Login successful! Redirecting to dashboard...');
                        // In production, you would redirect to dashboard
                        // window.location.href = '/dashboard';
                        
                        // Reset button
                        loginButton.disabled = false;
                        loginButton.innerHTML = `<span>Sign In</span>`;
                    }, 1500);
                }
            });
            
            // Microsoft SSO button
            const ssoButton = document.querySelector('.btn-sso-azure');
            ssoButton.addEventListener('click', function() {
                alert('Redirecting to Microsoft authentication...');
            });
        });
    </script>
</body>
</html>