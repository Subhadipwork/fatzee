<style>
    @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap");

    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Quicksand", sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        width: 100%;
        background: #222431;
        padding: 40px 20px;
    }

    /* Snow */

    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    main {
        display: grid;
        grid-template-columns: 45% 55%;
        place-items: center;
        background: #f6f6f6;
        width: min(700px, 95%);
        border-radius: 20px;
    }

    /* Left Side */

    .left-side {
        height: 100%;
        width: 100%;
        background-image: url(https://w0.peakpx.com/wallpaper/368/160/HD-wallpaper-comfortable-chair-clock-furniture-sofa-table-vase.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        pointer-events: none;
        border-radius: 20px 0 0 20px;
    }

    /* Right Side */

    .right-side {
        padding: 60px;
    }

    /* Button Group */

    .btn-group {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        gap: 5px;
        margin-bottom: 32px;
    }

    .btn-group .btn {
        display: flex;
        align-items: center;
        column-gap: 4px;
        width: max-content;
        font-size: 0.8rem;
        font-weight: 500;
        padding: 8px 6px;
        border: 2px solid #6b7280;
        border-radius: 5px;
        background-color: #f6f6f6;
        transform: scale(1);
        cursor: pointer;
        transition: transform 0.1s ease, background-color 0.5s, color 0.5s;
    }

    .btn-group .btn:focus {
        transform: scale(0.97);
    }

    .btn-group .btn:hover {
        background-color: #000;
        color: #eee;
    }

    .btn img {
        width: 16px;
        height: 16px;
    }

    .logo {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f6f6f6;
        border-radius: 50%;
        padding: 2px;
    }

    /* OR */

    .or {
        position: relative;
        text-align: center;
        margin-bottom: 24px;
        font-size: 1rem;
        font-weight: 600;
    }

    .or::before,
    .or::after {
        content: "";
        position: absolute;
        top: 50%;
        width: 40%;
        height: 1px;
        background: #000;
    }

    .or::before {
        left: 0;
    }

    .or::after {
        right: 0;
    }

    /* Inputs and Labels */

    input {
        width: 100%;
        padding: 12px 20px;
        border: 2px solid #ccc;
        outline: 0;
        border-radius: 5px;
        background-color: transparent;
        margin: 4px 0 18px;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.5s;
    }

    input:focus {
        border: 2px solid #000;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
        -webkit-background-clip: text;
        -webkit-text-fill-color: #000;
        transition: background-color 5000s ease-in-out 0s;
    }

    label {
        font-weight: 600;
        font-size: 0.9rem;
    }

    /* Login Button */

    .login-btn {
        width: 100%;
        font-size: 0.9rem;
        font-weight: 600;
        padding: 8px 24px;
        margin: 12px 0 24px;
        border: 2px solid #6b7280;
        border-radius: 5px;
        background-color: #f6f6f6;
        cursor: pointer;
        transition: all 0.5s;
    }

    .login-btn:hover {
        background-color: #000;
        color: #eee;
    }

    /* Links */

    .links {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    a:link,
    a:visited,
    a:hover,
    a:active {
        text-decoration: none;
    }

    a {
        color: #000;
        font-size: 0.88rem;
        font-weight: 600;
        letter-spacing: -1px;
        transition: all 0.4s ease;
    }

    a:hover {
        color: rgb(13, 133, 185);
    }

    /* Media Queries */

    @media (max-width: 800px) {
        .container {
            width: 90%;
        }
    }

    @media (max-width: 500px) {
        .container {
            width: 100%;
            height: 100vh;
            border-radius: 0;
        }
    }

    @media (max-width: 400px) {
        .container {
            width: 100%;
            height: 100vh;
            border-radius: 0;
        }
    }

    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #dc3545;
    }
</style>

<body>
    <div id="particles-js" class="snow"></div>

    <main>
        <div class="left-side"></div>

        <div class="right-side">
            <form action="{{ route('admin.login.submit') }}" method="POST">

                @csrf
                {{-- <div class="or">Admin Login</div> --}}

                <div class="logo">
                    <img src="https://img.icons8.com/color/48/000000/administrator-male.png"/>
                </div>
                <h4 class=" text-align-center">Admin Login</h4>

                <label for="email">Email</label>
                <input type="text" placeholder="Enter Email" name="email" required value="{{ old('email') }}" />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="password">Password</label>
                <input type="password" placeholder="Enter Password" name="password" required />

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <button type="submit" class="login-btn">Sign in</button>
                <div class="links">
                    <a href="#">Forgot password?</a>
                </div>
            </form>
        </div>

    </main>
</body>

<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
    particlesJS("particles-js", {
        particles: {
            number: {
                value: 300,
                density: {
                    enable: true,
                    value_area: 800,
                },
            },
            color: {
                value: "#fff",
            },
            shape: {
                type: "circle",
                stroke: {
                    width: 0,
                    color: "#000000",
                },
                polygon: {
                    nb_sides: 5,
                },
            },
            opacity: {
                value: 1,
                random: false,
                anim: {
                    enable: false,
                    speed: 1,
                    opacity_min: 0.1,
                    sync: false,
                },
            },
            size: {
                value: 3,
                random: true,
                anim: {
                    enable: false,
                },
            },
            line_linked: {
                enable: false,
            },
            move: {
                enable: true,
                speed: 2,
                direction: "bottom",
                random: false,
                straight: false,
                out_mode: "out",
                bounce: false,
                attract: {
                    enable: false,
                    rotateX: 600,
                    rotateY: 1200,
                },
            },
        },
        retina_detect: true,
    });
</script>