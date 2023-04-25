import Alpine from "alpinejs"

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    Alpine.data('imgPreview', (defaultImage = '/images/1x1_picture.png') => ({
        imgsrc: defaultImage,
        previewFile() {
            console.log(defaultImage);
            let file = this.$refs.myFile.files[0];
            if (!file || file.type.indexOf('image/') === -1) return;
            this.imgsrc = defaultImage;
            let reader = new FileReader();

            reader.onload = e => {
                this.imgsrc = e.target.result;
            }

            reader.readAsDataURL(file);
        }
    }))
});

Alpine.start()
