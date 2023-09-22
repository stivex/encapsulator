<?php

namespace Drupal\encapsulator\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Comprova si la data de fi sigui superior a la data d'inici
 */
class StartEndDatesConstraintValidator extends ConstraintValidator {

	/**
	* {@inheritdoc}
	*/
	public function validate($value, Constraint $constraint) {

		// $value --> variable que conté el node
		// $constraint --> la informació de la classe StartEndDatesConstraint.php

		//Comprovem que sigui un node
		if ($value->getEntityTypeId() != 'node') {
			//Si no és un node, no continuem la validació
			return;
		}

		//Comprovem que aquest node sigui del tipus de contingut 'capsula'
		if ($value->bundle() != 'capsula') {
			//Si no és un tipus de contingut 'capsula', no continuem la validació
			return;
		}

		//Per facilitar-ne la comprensió, utilitzarem una variable amb el nom '$node'
		$node = $value;  

		//Guardem els valors dels dos camps en dos variables
		$data_inici_emissio = $node->get('field_capsula_inici_emissio')->value;
		$data_fi_emissio = $node->get('field_capsula_fi_emissio')->value;

		if ($data_inici_emissio >= $data_fi_emissio) {
			//No s'ha superat la validació, informarem d'aquest fet a l'ususari
			$this->context->addViolation($constraint->startEndDateFail, []);
		}


	}


}