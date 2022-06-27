<?php

/**
 * Router
 */

class Router
{
  /** 
   * Associative array of routes
   * @var array
   */
  protected $routes = [];

  /**
   * Parameters from the matched route
   * @var array
   */
  protected $params = [];

  /**
   * Add a route to the routing table
   * 
   * @param string $route The rout URL
   * @param array $params Parameters (controller, action, etc.)
   * 
   * @return void
   */
  public function add($route, $params)
  {
    $this->routes[$route] = $params;
  }

  /**Get all routes from the routing table
   * 
   * @return array
   */
  public function getRoutes()
  {
    return $this->routes;
  }

  /**
   * Match the routes to the routes in the routing table, setting the $params 
   * property if a rite is found.
   * 
   * @param string $url The route URL
   * 
   * @return boolean true if a match found, false otherwise
   */
  public function match($url)
  {
    foreach ($this->routes as $route => $params) {
      if ($url == $route) {
        $this->params = $params;
        return true;
      }
    }
    return false;
  }

  /**
   * Get the currently matched parameters
   * 
   * @return array
   */
  public function getParams()
  {
    return $this->params;
  }
}
