var loadPicture = function (event) {
	  var getPicture = document.getElementById ('showPicture');
	  getPicture.src = URL.createObjectURL (event.target.files[0]);
};

var removeText = function (event){
    document.getElementById('changeText').text = "";
};


