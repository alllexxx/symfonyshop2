<?php
/**
 * Created by PhpStorm.
 * User: chmakav
 * Date: 30.09.2017
 * Time: 12:49
 */

namespace Ch\ShopBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Ch\ShopBundle\Entity\User;
use Ch\ShopBundle\Entity\Group;


class GroupAdmin extends AbstractAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $securityRolesType = method_exists('Symfony\Component\Form\AbstractType', 'getBlockPrefix')
            ? 'Sonata\UserBundle\Form\Type\SecurityRolesType'
            : 'sonata_security_roles';
        $formMapper
            ->tab('Group')
                ->with('General', array('class' => 'col-md-6'))
                ->add('name')
                ->end()
            ->end()
            ->tab('Security')
                ->with('Roles', array('class' => 'col-md-12'))
                ->add('roles', $securityRolesType, array(
                    'expanded' => true,
                    'multiple' => true,
                    'required' => false,
                    ))
                ->end()
            ->end()
        ;

    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('roles')


        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('roles')

        ;
    }

    // Fields to be shown on show action
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('roles')

        ;
    }
    public function getNewInstance()
    {
        return new Group('',array());
    }
}