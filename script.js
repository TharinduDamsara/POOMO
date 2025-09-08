// Button Effect
var sibtn = document.querySelector(".navbar li #sibtn");

sibtn.addEventListener("mouseover", (e) => {
    e.preventDefault();
    sibtn.classList.add("animate");

    setTimeout(() => {
        sibtn.classList.remove("animate");
    }, 1000);
});

// close btn
const bar = document.getElementById('bar');
const close = document.getElementById('close');
const menu = document.getElementById('menu');

if (bar) {
    bar.addEventListener('click', () => {
        menu.classList.add('active');
    })
}

if (close) {
    close.addEventListener('click', () => {
        menu.classList.remove('active');
    })
}

// Single P-Img
var mainImg = document.getElementById("mainImg");
var smimg = document.getElementsByClassName("sm-img");

for (let i = 0; i < smimg.length; i++) {
    smimg[i].addEventListener("mouseover", function () {
        mainImg.src = this.src;
    });
}

// dropdown profile
function setupDropdown(profilePicSelector, dropdownSelector) {
    const profilePic = document.querySelector(profilePicSelector);
    const dropdown = document.querySelector(dropdownSelector);

    if (!profilePic || !dropdown) {
        console.warn("Dropdown setup failed: Missing elements for selectors.");
        return;
    }

    profilePic.addEventListener('click', () => {
        dropdown.classList.toggle('show');
    });

    window.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target) && e.target !== profilePic) {
            dropdown.classList.remove('show');
        }
    });
}

// Usage
setupDropdown('.profile-pic', '.dropdown');

//Sign Up 
function signUp() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("f", fname);
    form.append("l", lname.value);
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("m", mobile.value);
    form.append("g", gender.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "success") {
                Swal.fire({
                    title: 'Welcome, ' + fname + '!',
                    text: 'You have signed up successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: response,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }
    };

    request.open("POST", "signupProcess.php", true);
    request.send(form);
}

//Sign In
function signIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberMe = document.getElementById("check");

    var form = new FormData();
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("r", rememberMe.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "success") {
                Swal.fire({
                    title: 'Success!',
                    text: 'You have successfully logged in.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = "index.php";
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: response,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }
    };

    request.open("POST", "signInProcess.php", true);
    request.send(form);
}

// Sign_Out
function signout() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to sign out!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, sign out!'
    }).then((result) => {
        if (result.isConfirmed) {
            var request = new XMLHttpRequest();

            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var response = request.responseText;
                    if (response == "success") {
                        Swal.fire({
                            title: 'Signed Out!',
                            text: 'You have been successfully signed out.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = "index.php";
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to sign out. Please try again.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            };

            request.open("POST", "signOutProcess.php", true);
            request.send();
        }
    });
}

//show/hide password
function showPassword1() {
    var show = document.getElementById("password2");
    var showi = document.getElementById("pwi");


    if (show.type == "password") {
        show.type = "text";
        showi.className = "bi bi-eye eye";
    } else {
        show.type = "password";
        showi.className = "bi bi-eye-slash eye"
    }

}

function showPassword() {
    var show = document.getElementById("password");
    var showi = document.getElementById("pwi1");


    if (show.type == "password") {
        show.type = "text";
        showi.className = "bi bi-eye eye";
    } else {
        show.type = "password";
        showi.className = "bi bi-eye-slash eye"
    }

}

//verification and reset Modal close
function closeModal() {
    window.location.reload();
}

//Forgot Password
function forgotPassword() {
    var email = document.getElementById("email2");

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                alert("Verification code has sent successfully to your email.");

            } else if (response == "Invalid Email Address") {
                window.location.reload();
                alert(response);
            }
            else {
                alert(response);
            }

        }
    }
    request.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    request.send();

}

//reset password modal
function resetModal1() {
    var email = document.getElementById("email2");
    var newpassword = document.getElementById("newp");
    var retypepassword = document.getElementById("retp");
    var verificationcode = getCode();

    if (verificationcode.length === 6) {
        var form = new FormData();
        form.append("e", email.value);
        form.append("n", newpassword.value);
        form.append("r", retypepassword.value);
        form.append("v", verificationcode);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.status == 200 && request.readyState == 4) {
                var response = request.responseText;
                if (response == "success") {
                    window.location.reload();
                    alert("Password Changed Successfully");

                } else {
                    alert(response);
                }
            }
        }
        request.open("POST", "resetPasswordProcess.php", true);
        request.send(form);

    } else {
        alert("Please enter a 6-digit code.");
    }

}

// Vcode-inputs
function getCode() {
    var code = '';
    for (var i = 1; i <= 6; i++) {
        var input = document.getElementById(i);
        code += input.value;  // Append the value of each input field
    }
    return code;
}


// password verification modal
function verify() {

    var verificationModal = document.getElementById("staticBackdrop");
    var resetModal = new bootstrap.Modal(document.getElementById("staticBackdrop3"));
    var email = document.getElementById("email2");
    var verificationcode = getCode();

    var form = new FormData();
    form.append("v", verificationcode);
    form.append("e", email.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "success") {

                if (verificationModal) {
                    var modal1 = bootstrap.Modal.getInstance(verificationModal);

                    if (modal1) {
                        modal1.hide();
                    }
                    resetModal.show();

                } else {
                    console.error("Verify modal not found!");
                }

            } else {
                alert(response);
            }

        }

    }

    request.open("POST", "verificationProcess.php", true);
    request.send(form);

}

//auto input next
document.addEventListener("DOMContentLoaded", function () {
    const inputs = document.querySelectorAll(".code-input");

    inputs.forEach((input, index) => {
        input.addEventListener("input", function () {
            if (input.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });

        input.addEventListener("keydown", function (e) {
            if (e.key === "Backspace" && input.value === "") {
                if (index > 0) {
                    inputs[index - 1].focus();
                }
            }
        });
    });
});

// Profile Settings
function profilePassword() {
    var show = document.getElementById("p_password");
    var showi = document.getElementById("toggle-password");


    if (show.type == "password") {
        show.type = "text";
        showi.className = "bi bi-eye eye";
    } else {
        show.type = "password";
        showi.className = "bi bi-eye-slash eye"
    }
}

function selectDistrict() {
    var province_id = document.getElementById("province").value;
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            document.getElementById("district").innerHTML = response;
            selectCity();
        }
    }

    request.open("GET", "selectDistrictProcess.php?id=" + province_id, true);
    request.send();
}

function selectCity() {
    var district_id = document.getElementById("district").value;
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            document.getElementById("city").innerHTML = response;
        }
    }

    request.open("GET", "selectCityProcess.php?id=" + district_id, true);
    request.send();
}

function changeProfileImg() {
    var p_image = document.getElementById("profileimage");

    p_image.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        document.getElementById("p_image").src = url;
    }
}

function updateProfile() {
    var fname = document.getElementById("first-name").value;
    var lname = document.getElementById("last-name");
    var mobile = document.getElementById("p_mobile");
    var address = document.getElementById("address");
    var city = document.getElementById("city");
    var pcode = document.getElementById("postal-code");
    var image = document.getElementById("profileimage");

    var form = new FormData();
    form.append("f", fname);
    form.append("l", lname.value);
    form.append("m", mobile.value);
    form.append("a", address.value);
    form.append("c", city.value);
    form.append("p", pcode.value);
    form.append("i", image.files[0]);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Profile Updated!" || response == "Profile Saved") {
                alert("Profile Updated Successfully, " + fname + "!");
                window.location.reload();
            } else if (response == "You have not selected any Profile Image.") {
                alert("You have not selected any Profile Image.");
                window.location.reload();
            } else {
                alert(response);
            }
        }
    }

    request.open("POST", "updateProfileProcess.php", true);
    request.send(form);
}

// Add_Products
function addNewColor() {
    var clr = document.getElementById("new-color");
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                Swal.fire({
                    title: "Success!",
                    text: "New Color added successfully!",
                    icon: "success"
                });

            } else {
                Swal.fire({
                    title: "Error!",
                    text: response,
                    icon: "error"
                });
            }
        }
    }

    request.open("GET", "saveColorProcess.php?clr=" + clr.value, true);
    request.send();
}

function previewImage(event, imgId) {
    const file = event.target.files[0];
    const allowedTypes = ["image/jpeg", "image/png", "image/jpg", "image/svg"];
    if (file && allowedTypes.includes(file.type) && file.size <= 2097152) {
        const reader = new FileReader();
        reader.onload = function () {
            document.getElementById(imgId).src = reader.result;
        };
        reader.readAsDataURL(file);
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Invalid File',
            text: 'Please upload an image (.jpg, .png, .svg) smaller than 2MB.',
        });
        event.target.value = "";
    }
}


function addProduct() {
    var category = document.getElementById("category");
    var brand = document.getElementById("brand");
    var title = document.getElementById("title");
    var clr = document.getElementById("color");
    var qty = document.getElementById("quantity");
    var cost = document.getElementById("cost");
    var dwc = document.getElementById("delivery-within");
    var doc = document.getElementById("delivery-out");
    var desc = document.getElementById("description");
    var imageUploader = document.querySelectorAll("#images1, #images2, #images3, #images4");

    var form = new FormData();

    form.append("ca", category.value);
    form.append("b", brand.value);
    form.append("t", title.value);
    form.append("clr", clr.value);
    form.append("qty", qty.value);
    form.append("cost", cost.value);
    form.append("dwc", dwc.value);
    form.append("doc", doc.value);
    form.append("d", desc.value);

    imageUploader.forEach(function (input, index) {
        if (input.files.length <= 4) {
            form.append("image" + (index + 1), input.files[0]);
        }
    });

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                // alert("Product Saved Successfully!");
                Swal.fire({
                    icon: 'success',
                    title: 'Product Saved',
                    text: 'Your product has been added successfully!',
                }).then(() => {
                    location.reload();
                });
            } else {
                // alert(response);
                Swal.fire({
                    icon: 'error',
                    title: 'Missing Information',
                    text: 'Please fill out all required fields!',
                });
            }
        }
    }

    request.open("POST", "addProductProcess.php", true);
    request.send(form);
}

// CategoryBox
const filterBox = document.querySelectorAll(".fe-box");
const products = document.querySelectorAll(".pro");

filterBox.forEach((button) => {
    button.addEventListener("click", () => {
        const category = button.getAttribute("data-category");

        products.forEach((product) => {
            if (product.getAttribute("data-category") === category) {
                product.style.display = "block";
            } else {
                product.style.display = "none";
            }
        });
    });
});

// Basic_Search
function bacicSearch(x) {
    var txt = document.getElementById("basic_search");

    var form = new FormData();
    form.append("t", txt.value);
    form.append("page", x);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            alert(response);
        }
    }

    request.open("POST", "basicSearchProcess.php", true);
    request.send(form);

}

// check_qty
function checkQty(qty) {
    var input = document.getElementById("qty_input");
    var inputVal = parseInt(input.value) || 0;

    if (isNaN(inputVal) || inputVal <= 0) {
        Swal.fire({
            title: "Invalid Quantity",
            text: "Quantity must be one or more.",
            icon: "warning",
            confirmButtonText: "Okay",
        });
        input.value = 1;
    } else if (inputVal > qty) {
        Swal.fire({
            title: "Insufficient Quantity",
            text: `Available stock: ${qty}`,
            icon: "error",
            confirmButtonText: "Got it!",
        });
        input.value = qty;
    }
}

