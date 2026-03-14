document.addEventListener('DOMContentLoaded', function() {
    const playButtons = document.querySelectorAll('.alumni-card__play');

    playButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const container = this.closest('.alumni-card__media--video');
            let rawPath = container.getAttribute('data-video-embed').trim();

            if (rawPath.startsWith('http') && !rawPath.includes('<iframe')) {
                let videoId = '';
                if (rawPath.includes('v=')) {
                    videoId = rawPath.split('v=')[1].split('&')[0];
                } else if (rawPath.includes('youtu.be/')) {
                    videoId = rawPath.split('youtu.be/')[1].split('?')[0];
                }
                
                rawPath = `<iframe src="https://www.youtube.com/embed/${videoId}?autoplay=1"
                 allow="autoplay; encrypted-media" allowfullscreen></iframe>`;
            }

            if (rawPath) {
                container.innerHTML = rawPath;
                const iframe = container.querySelector('iframe');
                if (iframe) {
                    iframe.style.width = "100%";
                    iframe.style.height = "100%";
                    iframe.style.position = "absolute";
                    iframe.style.top = "0";
                    iframe.style.left = "0";
                    iframe.style.border = "none";
                }
            }
        });
    });
});