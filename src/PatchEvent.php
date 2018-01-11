<?php

/**
 * @file
 * Dispatch events when patches are applied.
 */

namespace cweagans\Composer;

use Composer\EventDispatcher\Event;
use Composer\Package\PackageInterface;

class PatchEvent extends Event {

 /**
  * @var PackageInterface $package
  */
 protected $package;
 /**
  * @var string $url
  */
 protected $url;
 /**
  * @var string $description
  */
 protected $description;

  protected $installPath;

  /**
   * Constructs a PatchEvent object.
   *
   * @param string $eventName
   * @param PackageInterface $package
   * @param string $url
   * @param string $description
   * @param string $install_path
   *   The installation path used for applying the patch to.
   */
  public function __construct($eventName, PackageInterface $package, $url, $description, $install_path) {
    parent::__construct($eventName);
    $this->package = $package;
    $this->url = $url;
    $this->description = $description;
    $this->installPath = $install_path;
  }

  /**
   * Returns the package that is patched.
   *
   * @return PackageInterface
   */
  public function getPackage() {
    return $this->package;
  }

  /**
   * Returns the url of the patch.
   *
   * @return string
   */
  public function getUrl() {
    return $this->url;
  }

  /**
   * Returns the description of the patch.
   *
   * @return string
   */
  public function getDescription() {
    return $this->description;
  }

  public function getInstallPath() {
    return $this->installPath;
  }

  public function setInstallPath($path) {
    $this->installPath = $path;
    return $this;
  }

}
