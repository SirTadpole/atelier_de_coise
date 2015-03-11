<?php
/**
 * Created by PhpStorm.
 * User: jiboy
 * Date: 27/02/15
 * Time: 12:52
 */

namespace Atelier\Site\FrontBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class EventAdmin extends Admin {

  // Fields to be shown on create/edit forms
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
        ->with('Event')
          ->add('date', 'sonata_type_datetime_picker')
        ->end()
    ;
  }

  // Fields to be shown on filter forms
  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
        ->add('date')
    ;
  }

  // Fields to be shown on lists
  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
        ->addIdentifier('id')
        ->add('date')
    ;
  }

} 