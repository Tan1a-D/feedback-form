const form = document.querySelector('form');
const sms = document.querySelector('#reply-sms');
const email = document.querySelector('#reply-email');
const phone = document.querySelector('#phone');
function updateOptions() {
  sms.setCustomValidity(sms.checked || email.checked ? '' : 'Выберите хотя бы один вариант ответа.');
  document.querySelector('#phone-field').hidden = !sms.checked;
  phone.disabled = !sms.checked;
  phone.required = sms.checked;
}
sms.addEventListener('change', updateOptions);
email.addEventListener('change', updateOptions);
updateOptions();
