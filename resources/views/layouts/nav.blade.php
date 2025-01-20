<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    transition: background-color 0.3s;
}

.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.toggle-dark-mode {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 20px;
}

.notifications {
    position: relative;
}

.notification-bell {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 20px;
}

.badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 2px 5px;
    font-size: 12px;
}

.language-selector {
    margin: 0 15px;
}

.flag-icon {
    width: 24px;
    height: auto;
}

.user-avatar {
    position: relative;
    cursor: pointer;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.profile-dropdown {
    display: none;
    min-width: fit-content;
    width: 180px;
    position: absolute;
    top: 50px;
    right: 0;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    z-index: 1000;
}

.user-avatar .showProfile {
    display: block;
}

.profile-info {
    padding: 10px;
    display: flex;
    align-items: center;
}

.username {
    margin-right: 10px;
}

.pro-badge {
    background-color: gold;
    border-radius: 5px;
    padding: 2px 5px;
    font-size: 12px;
}

#profile-dropdown ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

#profile-dropdown li {
    padding: 10px 15px;
}
#profile-dropdown li a{
    position: relative;
}
#profile-dropdown li:hover {
    background-color: #f0f0f0;
}

#profile-dropdown .sign-out {
    color: red;
}

#profile-dropdown .pink-badge {
    background-color: pink;
    border-radius: 50%;
    padding: 2px 5px;
    font-size: 12px;
    position: absolute;
    left: 73px;
    width: fit-content;
}

/* Dark Mode Styles */
body.dark-mode {
    background-color: #333;
    color: #fff;
}

body.dark-mode .navbar {
    background-color: #444;
}

body.dark-mode .profile-dropdown { }
</style>


<!-- Nav -->
<nav class="navbar">
    <img src="https://fakeimg.pl/250x50/" alt="logo">
    <!-- links -->
    <div class="links">
        <button class="toggle-dark-mode" id="darkModeToggle">🌙</button>
        <div class="notifications me-3">
            <span class="badge">3</span>
            <button class="notification-bell">🔔</button>
        </div>
        <div id="user-avatar" class="user-avatar">
            <img src="https://fakeimg.pl/250x250/" alt="User  Avatar" class="avatar">
            <div id="profile-dropdown" class="profile-dropdown">
                <div class="profile-info">
                    <span class="username">{{$utilisateur->nom}}</span>
                </div>
                <ul>
                    <li><a href="#">My Profile</a></li>
                    <li><a href="#">My Subscription</a></li>
                    <li><a href="#">My Invoice <span class="badge pink-badge">4</span></a></li>
                    <li><a href="#">Account Settings</a></li>
                    <li class="sign-out"><a href="#">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- menu bar -->
    <div id="menu-bar">
    <span></span>
    <span></span>
    <span></span>
    </div>
</nav>


<script>
    const user_avatar = document.getElementById('user-avatar');
    const profile_dropdown = document.getElementById('profile-dropdown');
    const darkModeToggle = document.getElementById('darkModeToggle');

    function showProfile() {
        profile_dropdown.classList.toggle('showProfile');
    }
    user_avatar.addEventListener('click', ()=> {
        showProfile();
    })
    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
    }
    darkModeToggle.addEventListener('click', toggleDarkMode);

    document.addEventListener('click', function(event) {
    if (!user_avatar.contains(event.target) && !profile_dropdown.contains(event.target)) {
        profile_dropdown.classList.remove('showProfile');
    }
});
</script>