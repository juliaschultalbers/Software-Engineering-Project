<!--- 
This document is a template with a proposal for the structure of the model descriptions.  
Feel free to change and adapt the structure of the document!  
---> 

# Models description Sprint 1

## use-case-diagram 

The diagram shows the organisation of the daycare system including the scheduling system for vacation planning for the workers and the favourite food system, where every child can vote for their favourite meals. If there not enough workers for all groups the staffing group receives an alert notification 
Assumptions: 

- User-Accounts exists already
- User-names/devices
- Predetermined choice dishes
- Database is always up to date regarding groups
- Chef/Management already planned plans and organisation is set up, groups created and assigned
- App is already reinstalled and runnable on devices and bug free


## class diagram 
The management, the caregiver and the chef classes are inherited by the employee class and has access to all private attributes of employee. 
All employees use an ipad to use the scheduling system. The chef/ecotrophologist uses the favorite food system to add or update the dishes. 
The child- and parent class are inherited by the customer class. The child class use the favorite food system to vote for their favourite meal.

## ocl-invariants
Defines conditions that must always hold true for all instances of a class, specifying constraints on the object’s state.

## pre- and postconditions
Precondition: restrictions which have to be true before execution
Postcondition: restrictions which have to be true after execution



# Models description Sprint 2

## UML Activity Diagram
Das Activity Diagram bildet den gesamten Ablauf des Kita-Systems ab und zeigt die parallelen und aufeinander folgenden Aktivitäten der verschiedenen Systemkomponenten. Die Swimlanes trennen die Verantwortlichkeiten von Favourite meal, Dashboard system, Scheduling system, External Employee Manager und Chef. Es werden typische Abläufe wie das Hinzufügen, Bearbeiten und Löschen von Mahlzeiten, das Abstimmen über Mahlzeiten, das Einreichen und Bearbeiten von Urlaubsanträgen sowie das Management von Personalengpässen dargestellt. Entscheidungs- und Synchronisationsstellen steuern, wie das System auf verschiedene Ereignisse reagiert und wie die Prozesse ineinandergreifen. Das Diagramm macht deutlich, wie mehrere Prozesse gleichzeitig ablaufen und wie Informationen zwischen den Systemteilen fließen.

## Extended Finite State Machines (EFSM)
Scheduling System EFSM
Das EFSM für das Scheduling System beschreibt die möglichen Zustände und Übergänge beim Verwalten von Urlaubsanträgen, Krankmeldungen und der Personaleinsatzplanung. Das System startet im Standby-Modus und kann in Zustände wie vacation_request, find_replacement, staffing_gap, edited_shift_plan oder edit_group wechseln. Übergänge werden durch Ereignisse wie Urlaubsanfrage, Krankmeldung, Bearbeitung des Schichtplans oder das Finden einer Ersatzkraft ausgelöst. Guards und Aktionen steuern die Bedingungen für die Übergänge, zum Beispiel ob genügend Personal vorhanden ist oder eine Lücke im Dienstplan entsteht.

Favourite Meal System EFSM
Das EFSM für das Favourite Meal System modelliert den Ablauf der Mahlzeiten-Abstimmung. Es beginnt im Standby-Zustand, von wo aus entweder die Abstimmung gestartet oder der Speiseplan bearbeitet werden kann. Während der Abstimmung werden Stimmen gesammelt und gezählt, bis alle Kinder abgestimmt haben. Nach Ablauf der Abstimmungsphase oder wenn alle Stimmen eingegangen sind, werden die Ergebnisse verarbeitet und das System kehrt in den Standby-Modus zurück. Zeitliche Bedingungen (z.B. automatischer Reset nach 5 Minuten) und Aktionen wie das Hinzufügen oder Entfernen von Mahlzeiten sind berücksichtigt.

## Time Petri Nets (TAPN)
Das TAPN-Modell beschreibt die zeitlichen Abläufe und die Parallelität im Kita-System. Es werden Zustände wie standby, voting, edit_group, edit_meal_plan, edited_shift_plan und staffing_gap modelliert. Übergänge wie vacation_request, report_sickness, request_voting oder reset sind mit Zeitintervallen versehen, sodass z.B. die Abstimmung nur für einen begrenzten Zeitraum aktiv ist. Das Modell stellt sicher, dass Prozesse wie Abstimmung und Personaleinsatzplanung zeitlich korrekt ablaufen und sich nicht gegenseitig blockieren. Kritische Zeitbedingungen wie Deadlines und automatische Resets sind explizit abgebildet.

## UML Communication Diagram
Das Communication Diagram zeigt Objektinteraktionen und Nachrichtenaustausch zwischen Systemkomponenten während typischer Betriebsszenarien. Es veranschaulicht, wie Objekte wie Employee, Management, Child und verschiedene Systemkomponenten zusammenarbeiten, um Systemziele zu erreichen. Das Diagramm betont die Nachrichtensequenz und die Beziehungen zwischen Objekten während der Bearbeitung von Urlaubsanträgen und Mahlzeiten-Abstimmungen.

## UML Sequence Diagram
Das Sequence Diagram bietet eine zeitliche Sicht auf Interaktionen zwischen Systemakteuren und -komponenten. Es zeigt die chronologische Reihenfolge von Operationen für wichtige Anwendungsfälle wie Urlaubsantrags-Genehmigungsworkflows und Mahlzeiten-Abstimmungssitzungen. Das Diagramm enthält Lebenslinien für jedes teilnehmende Objekt und demonstriert, wie Nachrichten über die Zeit zwischen ihnen fließen, einschließlich aller Schleifen, Alternativen und parallelen Ausführungspfade, die während des normalen Systembetriebs auftreten.


