//Global variables
let width = 500,
	height = 0,
	filter = 'none',
	streaming = false;

//DOM elements
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const photos = document.getElementById('photos');
//const posts = document.getElementById('posts');
const photoButton = document.getElementById('photo-button');
const clearButton = document.getElementById('clear-button');
const photoFilter = document.getElementById('photo-filter');


// Get media stream

navigator.mediaDevices.getUserMedia({video: true, audio: false}
)
	.then(function(stream) {
		//link to video source
		video.srcObject = stream;
		video.play();
	})
	.catch(function(err) {
		console.log(`Error: ${err}`);
	});

	//play when ready
	video.addEventListener('canplay', function(e) {
		if (!streaming) {
			//set video canvas height
			height = video.videoHeight / (video.videoWidth / width);

			video.setAttribute('width', width);
			video.setAttribute('height', height);
			canvas.setAttribute('width', width);
			canvas.setAttribute('height', height);

			streaming = true;
		}
	}, false);

	//photo button event
	photoButton.addEventListener('click', function(e) {
		takePicture();
		//sendImageServer(image);
		e.preventDefault();
	}, false);

	//filter event
	photoFilter.addEventListener('change', function(e) {
		filter = e.target.value;
		video.style.filter = filter;
		e.preventDefault();
	});

	clearButton.addEventListener('click', function(e) {
		//clear photos
		photos.innerHTML = '';
		filter = 'none';
		video.style.filter = filter;
		photoFilter.selectedIndex = 0;
	});

	/* function sendImageServer(image)
	{
		var fd = new FormData(document.forms["form"]);
		var httpr = new XMLHttpRequest();
		httpr.open('POST', 'Camera.php', true);
		httpr.send(fd)
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "mvc/app/controllers/Camera.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("image=" + encodeURIComponent(image.replace("data:image/png;base64,", "")))
	} */

	//take picture from canvas
	function takePicture()
	{
		const context = canvas.getContext('2d');
		if (width && height) {
			canvas.width = width;
			canvas.height = height;

			//draw image to canvas
			context.drawImage(video, 0, 0, width, height);

			// create image from canvas
			const imgUrl = canvas.toDataURL('image/png');

			// create image element
			const img = document.createElement('img');

			//set image to src
			img.setAttribute('src', imgUrl);

			//set image filter
			img.style.filter = filter;

			//add image to photos
			photos.appendChild(img);

			saveImage(imgUrl, filter);

		}

		function saveImage(imgUrl, filter)
		{
			var xhttp = new XMLHttpRequest();
			xhttp.open("POST", "", true);
			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhttp.onload = function()
			{
				let element = document.createElement("img");
				element.src = "/mvc/img/"+xhttp.responseText;
				//posts.insertBefore(element, posts.childNodes[0]);
			}
			xhttp.send("imgData="+imgUrl+"&filter="+filter);
		}
	}






