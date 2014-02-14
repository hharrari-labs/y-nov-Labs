<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // ynov_labs_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ynov_labs_homepage')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/contact')) {
            // contact
            if (rtrim($pathinfo, '/') === '/contact') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'contact');
                }

                return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ContactController::indexAction',  '_route' => 'contact',);
            }

            // contact_show
            if (preg_match('#^/contact/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'contact_show')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ContactController::showAction',));
            }

            // contact_new
            if ($pathinfo === '/contact/new') {
                return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ContactController::newAction',  '_route' => 'contact_new',);
            }

            // contact_create
            if ($pathinfo === '/contact/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_contact_create;
                }

                return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ContactController::createAction',  '_route' => 'contact_create',);
            }
            not_contact_create:

            // contact_edit
            if (preg_match('#^/contact/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'contact_edit')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ContactController::editAction',));
            }

            // contact_update
            if (preg_match('#^/contact/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_contact_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'contact_update')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ContactController::updateAction',));
            }
            not_contact_update:

            // contact_delete
            if (preg_match('#^/contact/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_contact_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'contact_delete')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ContactController::deleteAction',));
            }
            not_contact_delete:

        }

        if (0 === strpos($pathinfo, '/e')) {
            if (0 === strpos($pathinfo, '/ecole')) {
                // ecole
                if (rtrim($pathinfo, '/') === '/ecole') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'ecole');
                    }

                    return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EcoleController::indexAction',  '_route' => 'ecole',);
                }

                // ecole_show
                if (preg_match('#^/ecole/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ecole_show')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EcoleController::showAction',));
                }

                // ecole_new
                if ($pathinfo === '/ecole/new') {
                    return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EcoleController::newAction',  '_route' => 'ecole_new',);
                }

                // ecole_create
                if ($pathinfo === '/ecole/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ecole_create;
                    }

                    return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EcoleController::createAction',  '_route' => 'ecole_create',);
                }
                not_ecole_create:

                // ecole_edit
                if (preg_match('#^/ecole/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ecole_edit')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EcoleController::editAction',));
                }

                // ecole_update
                if (preg_match('#^/ecole/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_ecole_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ecole_update')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EcoleController::updateAction',));
                }
                not_ecole_update:

                // ecole_delete
                if (preg_match('#^/ecole/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_ecole_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ecole_delete')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EcoleController::deleteAction',));
                }
                not_ecole_delete:

            }

            if (0 === strpos($pathinfo, '/evenement')) {
                // evenement
                if (rtrim($pathinfo, '/') === '/evenement') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'evenement');
                    }

                    return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EvenementController::indexAction',  '_route' => 'evenement',);
                }

                // evenement_show
                if (preg_match('#^/evenement/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'evenement_show')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EvenementController::showAction',));
                }

                // evenement_new
                if ($pathinfo === '/evenement/new') {
                    return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EvenementController::newAction',  '_route' => 'evenement_new',);
                }

                // evenement_create
                if ($pathinfo === '/evenement/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_evenement_create;
                    }

                    return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EvenementController::createAction',  '_route' => 'evenement_create',);
                }
                not_evenement_create:

                // evenement_edit
                if (preg_match('#^/evenement/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'evenement_edit')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EvenementController::editAction',));
                }

                // evenement_update
                if (preg_match('#^/evenement/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_evenement_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'evenement_update')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EvenementController::updateAction',));
                }
                not_evenement_update:

                // evenement_delete
                if (preg_match('#^/evenement/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_evenement_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'evenement_delete')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\EvenementController::deleteAction',));
                }
                not_evenement_delete:

            }

        }

        if (0 === strpos($pathinfo, '/labs')) {
            // labs
            if (rtrim($pathinfo, '/') === '/labs') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'labs');
                }

                return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\LabsController::indexAction',  '_route' => 'labs',);
            }

            // labs_show
            if (preg_match('#^/labs/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'labs_show')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\LabsController::showAction',));
            }

            // labs_new
            if ($pathinfo === '/labs/new') {
                return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\LabsController::newAction',  '_route' => 'labs_new',);
            }

            // labs_create
            if ($pathinfo === '/labs/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_labs_create;
                }

                return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\LabsController::createAction',  '_route' => 'labs_create',);
            }
            not_labs_create:

            // labs_edit
            if (preg_match('#^/labs/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'labs_edit')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\LabsController::editAction',));
            }

            // labs_update
            if (preg_match('#^/labs/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_labs_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'labs_update')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\LabsController::updateAction',));
            }
            not_labs_update:

            // labs_delete
            if (preg_match('#^/labs/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_labs_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'labs_delete')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\LabsController::deleteAction',));
            }
            not_labs_delete:

        }

        if (0 === strpos($pathinfo, '/p')) {
            if (0 === strpos($pathinfo, '/photo')) {
                // photo
                if (rtrim($pathinfo, '/') === '/photo') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'photo');
                    }

                    return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\PhotoController::indexAction',  '_route' => 'photo',);
                }

                // photo_show
                if (preg_match('#^/photo/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'photo_show')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\PhotoController::showAction',));
                }

                // photo_new
                if ($pathinfo === '/photo/new') {
                    return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\PhotoController::newAction',  '_route' => 'photo_new',);
                }

                // photo_create
                if ($pathinfo === '/photo/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_photo_create;
                    }

                    return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\PhotoController::createAction',  '_route' => 'photo_create',);
                }
                not_photo_create:

                // photo_edit
                if (preg_match('#^/photo/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'photo_edit')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\PhotoController::editAction',));
                }

                // photo_update
                if (preg_match('#^/photo/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_photo_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'photo_update')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\PhotoController::updateAction',));
                }
                not_photo_update:

                // photo_delete
                if (preg_match('#^/photo/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_photo_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'photo_delete')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\PhotoController::deleteAction',));
                }
                not_photo_delete:

            }

            if (0 === strpos($pathinfo, '/projet')) {
                // projet
                if (rtrim($pathinfo, '/') === '/projet') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'projet');
                    }

                    return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ProjetController::indexAction',  '_route' => 'projet',);
                }

                // projet_show
                if (preg_match('#^/projet/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'projet_show')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ProjetController::showAction',));
                }

                // projet_new
                if ($pathinfo === '/projet/new') {
                    return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ProjetController::newAction',  '_route' => 'projet_new',);
                }

                // projet_create
                if ($pathinfo === '/projet/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_projet_create;
                    }

                    return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ProjetController::createAction',  '_route' => 'projet_create',);
                }
                not_projet_create:

                // projet_edit
                if (preg_match('#^/projet/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'projet_edit')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ProjetController::editAction',));
                }

                // projet_update
                if (preg_match('#^/projet/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_projet_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'projet_update')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ProjetController::updateAction',));
                }
                not_projet_update:

                // projet_delete
                if (preg_match('#^/projet/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_projet_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'projet_delete')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\ProjetController::deleteAction',));
                }
                not_projet_delete:

            }

        }

        if (0 === strpos($pathinfo, '/site')) {
            // site
            if (rtrim($pathinfo, '/') === '/site') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'site');
                }

                return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\SiteController::indexAction',  '_route' => 'site',);
            }

            // site_show
            if (preg_match('#^/site/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'site_show')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\SiteController::showAction',));
            }

            // site_new
            if ($pathinfo === '/site/new') {
                return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\SiteController::newAction',  '_route' => 'site_new',);
            }

            // site_create
            if ($pathinfo === '/site/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_site_create;
                }

                return array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\SiteController::createAction',  '_route' => 'site_create',);
            }
            not_site_create:

            // site_edit
            if (preg_match('#^/site/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'site_edit')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\SiteController::editAction',));
            }

            // site_update
            if (preg_match('#^/site/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_site_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'site_update')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\SiteController::updateAction',));
            }
            not_site_update:

            // site_delete
            if (preg_match('#^/site/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_site_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'site_delete')), array (  '_controller' => 'Ynov\\LabsBundle\\Controller\\SiteController::deleteAction',));
            }
            not_site_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
