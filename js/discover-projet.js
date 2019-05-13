// document ready in ES6
Document.prototype.ready = callback => {
	if (callback && typeof callback === 'function') {
		document.addEventListener("DOMContentLoaded", () => {
			if (document.readyState === "interactive" || document.readyState === "complete") {
				return callback();
			}
		});
	}
};

(function() {
  // construction des queries
	let params = {};
	params['project'] ="all";
	//let url = new URL("php/discover-projet.php", "http://localhost/projetWebS2/");
	let url = new URL("php/discover-projet.php", "https://imackickstarter.000webhostapp.com/");
	url.search = new URLSearchParams(params);
	console.log(url);

	// méthode GET
	fetch(url)
		.then(response => {
			return response.json();
		})
		.then(data => {
			if (data.length == 0) {
				document.getElementById('galleryProjects').appendChild(document.createTextNode("Nothing Found"));
			} else {
				data.forEach(function(element) {

					var html = [
					    '<div class="col-md-3">',
					          '<div class=" projectThumbnail">',
					           '<div class="thumbnailImageBox text-center">',
					              '<!-- change image file path dinamically -->',
					              '<img class="thumbnailImage" src="./img/test/test1.jpg"/>',
					            '</div>',
					            '<!-- change project title dinamically -->',
					            '<div class="thumbnailTitle">'+element.name_project+'</div>',
					            '<div class="progress">',
					             '<!-- change progress-bar width(style.css) and aria-valuenow dynamically -->',
					              '<div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>',
					            '</div>',
					            '<!-- change percentage dynamically -->',
					            '<div class="thumbnailPercentage">Soutenu à 50%</div>',
					            '<!-- change description dynamically -->',
					            '<div class="thumbnailText">'+element.description_project+'</div>',
					            '<div class="text-center thumbnailButtonBox">',
					              '<a class="thumbnailLink" href="./project.php">',
					                '<button class="myButton thumbnailButton">Soutenir',
					                  '<div class="buttonSticker buttonHeart d-flex justify-content-center align-items-center">',
					                    '<img src="./img/heart.png"/>',
					                  '</div>',
					                '</button>',
					              '</a>',
					            '</div>',
					          '</div>',
					        '</div>',
					].join("\n");
					document.getElementById('galleryProjects').insertAdjacentHTML('beforeend',html);
				});
				console.log(data);
			}
		})
		.catch(error => {
			console.log(error);
		});
	// bloc catch appelé lorsqu'il y a une erreur

})();



	

