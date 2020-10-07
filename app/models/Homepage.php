<?php

class Homepage {
    private $database;
	public function __construct() {
		$this->database = new Database;
    }

    public function cinema() {
        $query = "SELECT * FROM cinema WHERE id > 0 AND active > 0";
        $this->database->prepare($query);
        $data = $this->database->getArray();
        return $data;
    }

    public function fetchContent($page) {
      $query = "SELECT * FROM pages WHERE page_name=:page_name";
      $this->database->prepare($query);
      $this->database->bind(":page_name", $page);
      $data = $this->database->getArray();
      return $data;
    }

    public function sendmail($data) {
      $to = $data['email'];
      $subject = "HTML email";

      $message = "
      <html>
      <head>
      <title>Uw Bericht is verstuurt</title>
      </head>
      <body>
      <p>Wij zullen zo snel mogelijk contact met u opnemen!</p>
      </body>
      </html>
      ";

      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <webmaster@example.com>' . "\r\n";
      $headers .= 'Cc: myboss@example.com' . "\r\n";

      mail($to,$subject,$message,$headers);
    }
}
