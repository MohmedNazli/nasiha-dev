<template>
  <div class="prevent-web">
    <div class="container h-100">
      <div class="row h-100 d-flex align-items-center">
        <div class="col-md-4 mx-auto">
          <div class="bg-white text-center box">
            <img src="../assets/images/logo.svg" alt="logo" class="mb-4" />
            <h3>
              عذراً.. يجب فتح الرابط من الجوال.
            </h3>
            <p>
              أهلا بك.. يجب فتح الموقع من الجوال مباشرة عن طريق QR في الأسفل، بعد فتح الرابط قم بعمل اختصار للرابط على سطح المكتب وهكذا سوف يكتمل تنزيل التطبيق بشكل مباشر .
            </p>
            <div class="qr">
              <img src="../assets/images/qrcode.png" alt="qr" />
              <p class="mb-0 mt-3">
                امسح هنا للعرض على جوالك
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
.prevent-web {
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  right: 0;
  background-color: #57be80;
  z-index: 111;
  display: none;
  @media screen and (min-width: 768px) {
    display: block;
  }
  .box {
    border-radius: 8px;
    padding: 40px;
    img {
      height: 80px;
    }
    h3 {
      font-size: 20px;
      font-weight: 400;
      color: #111a2c;
      margin-bottom: 1rem;
    }
    p {
      font-size: 14px;
      font-weight: 400;
      color: #111a2c;
      margin-bottom: 48px;
    }
  }
}
</style>
