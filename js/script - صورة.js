
function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email);
}

document.addEventListener("DOMContentLoaded", function () {
  
  alert("مرحباً بكم في خدمة التوصيل داخل الجامعة!");
  
  
  const btn = document.querySelector("button");
  if (btn) {
    const now = new Date();
    const span = document.createElement("span");
    span.textContent = `  ${now.toLocaleString("ar-EG")}`; 
    span.style.marginLeft = "0.5rem";
    btn.parentNode.insertBefore(span, btn.nextSibling);
  }

  
  const form = document.querySelector("form");
  if (!form) return;

  form.addEventListener("submit", function (e) {
    e.preventDefault(); 
   
    const requiredFields = form.querySelectorAll("[required]");
    let allFilled = true;

    requiredFields.forEach(field => {
      if (!field.value.trim()) {
        field.style.borderColor = "red";
        allFilled = false;
      } else {
        field.style.borderColor = "#ccc";
      }
    });

    if (!allFilled) {
      showMessage("يرجى تعبئة جميع الحقول المطلوبة!", "error");
      return;
    }

   
    const emailField = document.getElementById("email");
    if (emailField) {
      const email = emailField.value.trim();
      if (!validateEmail(email)) {
        emailField.style.borderColor = "red";
        showMessage("يرجى إدخال بريد إلكتروني صحيح!", "error");
        return;
      } else {
        emailField.style.borderColor = "#ccc";
      }
    }

    
    const actionUrl = form.getAttribute("action") || window.location.href;
    fetch(actionUrl, {
      method: form.method || "POST",
      body: new FormData(form)
    })
    .then(response => response.json())     
    .then(data => {
      showMessage(data.message, data.type);
      if (data.type === "success") {
        form.reset();
      }
    })
    .catch(err => {
      console.error(err);
      showMessage("فشل الاتصال بالخادم. حاول مرة أخرى.", "error");
    });
  });

  
  function showMessage(text, type) {
    const oldMsg = document.querySelector(".confirm-message");
    if (oldMsg) oldMsg.remove();

    const msg = document.createElement("div");
    msg.className = "confirm-message " + type; 
    msg.innerText = text;
    form.appendChild(msg);

    
    setTimeout(() => {
      msg.style.opacity = 0;
      setTimeout(() => msg.remove(), 1000);
    }, 4000);
  }
});

