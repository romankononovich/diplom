//chrome.exe --user-data-dir="C:/Chrome dev session" --disable-web-security
var app = angular.module('DiplomApp', []);
app.config(['$httpProvider', function ($httpProvider) {
        $httpProvider.defaults.withCredentials = true;
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
}
]);
app.controller('bufer', function ($scope, $http) {
    $scope.one = function () {
        alert('dsds');
    };
    $scope.sendTest = function () {
        var data = {
            userTest: $scope.areaMain
        };
        $http({
            method: 'POST'
            , url: "admin/createUTest.php"
            , headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
            , data: data
        }).success(function (data, status) {
            if (data) {
                function a() {
                    let testtime = Math.round(new Date().getTime() / 1000)
                    var script = document.createElement('script');
                    script.src = "admin/userSolution.js?" + testtime;
                    document.body.appendChild(script);
                };

                function b() {
                    let testtime = Math.round(new Date().getTime() / 1000)
                    var script = document.createElement('script');
                    //script.src = "tests.js";
                    script.src = "Tests/test1.js?" + testtime;
                    document.body.appendChild(script);
                };
                a();
                b();
            }
        }).error(function (data, status, headers, config) {});
    };
});
