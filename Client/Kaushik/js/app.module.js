var app= angular.module('app',[]);
app.controller('appCtrl',appCtrl);

function appCtrl($scope,$http,$window) {
	$scope.show='signup';
	$scope.showChange=function showChange(show){
		$scope.show=show;
	}
	$scope.login=function(email,password){
	
		data=btoa(""+email+":"+password+"");
		$http.post('http://127.0.0.1:8000/v1/auth/login', {}, {
			headers: {"Authorization": "Basic " + data}
		}).then((a) => {
			console.log(a.data);
			$window.location.href = '#!/v1/fghfhg';
		});

	}
	$scope.signup=function(name,email,password){
		var data={
			'name':name,
			'email':email,
			'password':password
		};
		$http.post('http://127.0.0.1:8000/v1/register/signup', data).then((a) => {
			console.log(a.data)
		});

		

	}
}