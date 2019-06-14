<?php

namespace App\Form;

use App\Entity\Attribute;
use App\Entity\Mob;
use App\Repository\AttributeRepository;
use App\Repository\MobRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MobFilterType extends AbstractType
{
    /**
     * @var MobRepository
     */
    private $mobRepository;

    private $Name;

    private $Family;

    private $Class;

    private $GradeNat;

    private $Attribute;

    public function __construct(MobRepository $mobRepository) {

        $this->mobRepository = $mobRepository;
        $this->Name = $mobRepository->getName();
        $this->Family = $mobRepository->getFamily();
        $this->Class = $mobRepository->getClass();
        $this->GradeNat = $mobRepository->getGradeNat();
        $this->Attribute = $mobRepository->getAttribute();
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->Class['Tous'] = 'Tous';
        $builder
            ->add('Name', TextareaType::class, array(
                'label' => 'Name :',
                'required' => false,
                'empty_data' => '',
            ))
            ->add('Family', TextareaType::class, array(
                'label' => 'Family :',
                'required' => false,
                'empty_data' => '',
            ))
            ->add('Class',ChoiceType::class, array(
                'choices'  =>$this->Class ,
                'label' => 'Class :',
                'preferred_choices' => function($Class) {
                    return ($Class === 'Tous');},
            ))
            ->add('GradeNat',NumberType::class, array(
                'label' => 'GradeNat :',
                'required' => false,
            ))
            ->add('Attribute', ChoiceType::class, array(
                'choices'  => $this->Attribute,
                'label' => 'Attribute :',
                'multiple' => true,
                'by_reference' => false,
                'required' => false,
            ))
            ->add('Valider', SubmitType::class)
            ->add('Annuler', ResetType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
        ));
    }
}
