<?php

class Luas
{
  /** 
  $p adalah panjang
  $l adalah lebar
  */
  public function persegi_panjang($p, $l)
  {
    return $p * $l;
  }

  /** 
  $s adalah panjang sisi
  */
  public function persegi($s)
  {
    return pow($s, 2);
  }

  /** 
  $a adalah alas
  $t adalah tinggi
  */
  public function jajar_genjang($a, $t)
  {
    return $a * $t;
  }

  /** 
  $d1 adalah diagnoal 1
  $d2 adalah diagonal 2
  */
  public function belah_ketupat($d1, $d2)
  {
    return 0.5 * $d1 * $d2;
  }

  /** 
  $d1 adalah diagnoal 1
  $d2 adalah diagonal 2
  */
  public function layang_layang($d1, $d2)
  {
    return 0.5 * $d1 * $d2;
  }

  /** 
  $a adalah alas
  $t adalah tinggi
  */
  public function segitiga($a, $t)
  {
    return 0.5 * $a * $t;
  }
  /** 
  $r1 adalah panjang rusuk 1
  $r2 adalah panjang rusuk 2
  $t adalah tinggi
  */
  public function trapesium($r1, $r2, $t)
  {
    return 0.5 * ($r1 + $r2) * $t;
  }

  /** 
  $r adalah jari-jari lingkaran
  */
  public function lingkaran($r)
  {
    return pi() * (pow($r, 2));
  }

}