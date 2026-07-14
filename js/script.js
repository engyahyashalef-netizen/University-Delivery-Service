
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
    
    let allFilled = true;
    form.querySelectorAll("[required]").forEach(field => {
      if (!field.value.trim()) {
        field.style.borderColor = "red";
        allFilled = false;
      } else {
        field.style.borderColor = "#ccc";
      }
    });
    if (!allFilled) {
      e.preventDefault();
      alert("يرجى تعبئة جميع الحقول المطلوبة!");
      return;
    }

    
    const emailField = document.getElementById("email");
    if (emailField) {
      const email = emailField.value.trim();
      if (!validateEmail(email)) {
        e.preventDefault();
        emailField.style.borderColor = "red";
        alert("يرجى إدخال بريد إلكتروني صحيح!");
        return;
      }
    }
  
  });
});

