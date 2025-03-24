let cropper;
const imageInput = document.getElementById("profile_picture_input");
const preview = document.getElementById("profile_preview");
const croppedInput = document.getElementById("cropped_image_input");

imageInput.addEventListener("change", function (e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (event) {
        preview.src = event.target.result;
        preview.style.display = "block";

        if (cropper) cropper.destroy();

        cropper = new Cropper(preview, {
            aspectRatio: 1,
            viewMode: 1,
            autoCropArea: 1,
            ready() {
                updateCroppedImage(); // Initial crop
            },
            cropend() {
                updateCroppedImage();
            },
        });
    };
    reader.readAsDataURL(file);
});

function updateCroppedImage() {
    if (!cropper) return;
    const canvas = cropper.getCroppedCanvas({
        width: 300,
        height: 300,
    });
    croppedInput.value = canvas.toDataURL("image/png");
}
