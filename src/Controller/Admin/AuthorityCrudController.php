<?php

namespace App\Controller\Admin;

use App\Entity\Authority;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\{IdField, TextField, AssociationField};

class AuthorityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Authority::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            TextField::new('website'),
            AssociationField::new('Category')->setFormTypeOption('choice_label', 'name'),
        ];
    }
    
}
