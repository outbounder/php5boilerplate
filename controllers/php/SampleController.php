<?php
require_once("view.php");

class SampleController {
	
	public function run($req, $res) {
		$res->send(view("views/layout-default.html", array(
            "javascript" => $res->javascript->get(),
            "stylesheet" => $res->stylesheet->get(),
            "content" => "testValue1",
            "time" => $req->benchmark->elpasedTime(),
            "javascript" => $res->javascript()
        )));
	}

    public function run2($req, $res) {
        $response = view("views/layout-default.html", array(
            "javascript" => $res->javascript->get(),
            "stylesheet" => $res->stylesheet->get(),
            "content" => view("views/sample.html", array(
                "content" => $req->param("key1", "defaultKey1Value"),
                "footer" => view("views/sample-footer.html", array(
                    "content" => $req->param("key2", "defaultKey2Value")
                ))
            )),
            "time" => $req->benchmark->elpasedTime()
        ));

        $res->send($response);
    }

    public function simulateError() {
        throw new Exception("Simulaltion complete");
    }

}

?>