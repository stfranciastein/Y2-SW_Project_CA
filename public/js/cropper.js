let cropper;
const imageInput = document.getElementById("profile_picture_input");
const preview = document.getElementById("profile_preview");
const croppedInput = document.getElementById("cropped_image_input");

const display = document.getElementById("profile_display");
const cropBox = document.getElementById("crop_box");
const uploadWrapper = document.getElementById("upload_wrapper");

imageInput.addEventListener("change", function (e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (event) {
        preview.src = event.target.result;

        // HIDE display + upload
        display.style.display = "none";
        uploadWrapper.style.display = "none";

        // SHOW cropper preview
        cropBox.style.display = "block";

        if (cropper) cropper.destroy();

        cropper = new Cropper(preview, {
            aspectRatio: 1,
            viewMode: 1,
            autoCropArea: 1,
            ready() {
                updateCroppedImage();
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
    const canvas = cropper.getCroppedCanvas({ width: 300, height: 300 });
    croppedInput.value = canvas.toDataURL("image/png");
}

function confirmCrop() {
    // Hide cropper
    cropBox.style.display = "none";

    // Set cropped image as final preview
    display.src = croppedInput.value;
    display.style.display = "block";

    // Re-add centering classes in case they got lost
    display.classList.add("mx-auto");

    // Restore upload button
    uploadWrapper.style.display = "block";

    if (cropper) cropper.destroy();
}

