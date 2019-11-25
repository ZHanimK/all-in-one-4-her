<?php

$datenbank = "db/datenbank.sqt";

  if (!file_exists($datenbank)) {
    $db = new PDO('sqlite:' . $datenbank);
    $db->exec("CREATE TABLE her (
      her_id        INTEGER PRIMARY KEY AUTOINCREMENT,
      who           INTEGER,
      firstname     TEXT,
      lastname      TEXT,
      age           INTEGER,
      gender        TEXT,
      legalStatus   TEXT,
      country       TEXT,
      education     TEXT,
      title         TEXT,
      degreeCountry TEXT,
      region        TEXT,
      organisation  TEXT,
      sector        TEXT,
      company       TEXT,
      position      TEXT,
      employees     INTEGER,
      experience    INTEGER,
      email         TEXT,
      all_password  TEXT
    )");

  }
  else {
  
    $db = new PDO('sqlite:' . $datenbank);
  }


  if (!is_writable($datenbank)) {
    chmod($datenbank, 0777);
  }
?>