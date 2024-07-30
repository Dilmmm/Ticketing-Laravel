<?php $__env->startSection( "title"); ?>
    <h1>Tous les tickets</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection( "contentIndex" ); ?>
    <div class="flex justify-end mr-10">
        <div class="flex items-center">
            <label for="searchbox" class="sr-only">Search</label>
            <div class="relative w-full pl-2 ">
                <div class="flex absolute inset-y-0 left-0 items-center pl-5 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="search" onkeyup="liveSearch()" id="searchbox" class="bg-gray-100 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-gray-500 focus:border-gray-500 block outline-none w-full pl-10 p-1 " placeholder="Filtre...">
            </div>
        </div>
    </div>
        <div class="md:max-w-full mx-auto flex">
            <div class="block w-1/6 mt-2 ml-1 mr-10 p-10 pb-4 rounded-lg bg-gradient-to-br from-blue-400 via-blue-300 to-blue-400 shadow-3xl mb-4 sticky top-4 self-start">
                <form class="" action="<?php echo e(route('searchTicket')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="grid gap-4 mb-4 lg:grid-cols-1 mx-auto">
                        <input class="inputRecherche focus:placeholder-gray-100 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900
                            text-md focus:ring-teal-500 focus:border-teal-500 block p-1 pl-2 focus:outline-none font-semibold placeholder-gray-600" type="text" placeholder="N°Dossier..." name="nDossier"  />

                        <input class="inputRecherche focus:placeholder-gray-100 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900
                            text-md focus:ring-teal-500 focus:border-teal-500 block w-full p-1 pl-2 focus:outline-none font-semibold placeholder-gray-600" type="text" placeholder="N°Serie..." name="nSerie" />

                        <input class="inputRecherche focus:placeholder-gray-100 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900
                                text-md focus:ring-teal-500 focus:border-teal-500 block w-full p-1 pl-2 focus:outline-none font-semibold placeholder-gray-600" type="text" placeholder="N°Ticket..." name="nTicket" />

                        <input class="inputRecherche focus:placeholder-gray-100 focus:bg-gray-100 shadow-md border border-gray-400 rounded-lg text-gray-900
                                text-md focus:ring-teal-500 focus:border-teal-500 block w-full p-1 pl-2 focus:outline-none font-semibold placeholder-gray-600" type="text" placeholder="Nom Client..." name="nomClient" />

                        <select name="typeTicket" id="typeTicket" class="uppercase cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg
                            focus:ring-teal-500 focus:border-teal-500 block w-full p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100">
                            <option value="">Type</option>
                            <?php $__currentLoopData = $typeTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeTicket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($typeTicket->CommentAbrege); ?>"><?php echo e($typeTicket->CommentTicket); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <select name="statut" id="statut" class="uppercase cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg
                            focus:ring-teal-500 focus:border-teal-500 block w-full p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100">
                            <option value="">Statut</option>
                            <?php $__currentLoopData = $statutTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statutTicket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($statutTicket->StatutTicket); ?>"><?php echo e($statutTicket->StatutTicket); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="grid gap-4 mb-6 lg:grid-cols-1 mb-2 mx-auto">
                        <select name="agence" id="agence" class="uppercase cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg
                            focus:ring-teal-500 focus:border-teal-500 block w-full p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100">
                            <option value="">Agence</option>
                            <?php $__currentLoopData = $agences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($agence->Agence); ?>"><?php echo e($agence->Agence); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <select name="urgenceTicket" id="urgenceTicket" class="uppercase cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg
                            focus:ring-teal-500 focus:border-teal-500 block w-full p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100">
                            <option value="">Urgence</option>
                            <?php $__currentLoopData = $urgenceTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $urgenceTicket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($urgenceTicket->ValeurUrgTicket); ?>"><?php echo e($urgenceTicket->LibelleUrgTicket); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <select class="uppercase cursor-pointer font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                                                p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100" name="intervenant" id="intervenant">
                            <option value="">Intervenant</option>
                            <?php $__currentLoopData = $intervenants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intervenant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($intervenant->Agence); ?>"><?php echo e($intervenant->Agence); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <input type="date"  name="fromDate" class="font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                             p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100"/>

                        <input type="date" name="toDate" class="font-semibold focus:bg-gray-100 shadow-md border border-gray-400 text-gray-800 text-md rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full
                            p-1 focus:outline-none hover:shadow-lg hover:bg-gray-100"/>

                        <button class="text-black font-semibold border border-gray-400 bg-gray-300 shadow-lg hover:bg-blue-600 hover:border-blue-600 hover:text-white focus:outline-none rounded-lg
                                        text-lg w-full sm:w-auto px-8 text-center" type="submit">Rechercher</button>
                    </div>
                </form>
            </div>
            <div class="overflow-auto lg:overflow-visible">
                <table class="table text-black border-separate" id="ticketListe">
                    <thead class="bg-gradient-to-br from-blue-400 via-blue-200 to-blue-400 text-md uppercase">
                        <tr class="odd:bg-white even:bg-gray-900">
                            <th class="p-4 cursor-pointer">Urgence</th>
                            <th class="p-2 cursor-pointer">N°Ticket</th>
                            <th class="p-2 cursor-pointer">Type</th>
                            <th class="p-2 cursor-pointer">Statut</th>
                            <th class="p-2 cursor-pointer">Affecté</th>
                            <th class="p-2 cursor-pointer">N°Série</th>
                            <th class="p-2 cursor-pointer">Agence</th>
                            <th class="p-2 cursor-pointer">N°Dossier</th>
                            <th class="p-2">Problème</th>
                            <th class="p-2 cursor-pointer">Nom Client</th>
                            <th class="p-2 cursor-pointer">Date début</th>
                            <th class="p-2 cursor-pointer">Date fin</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="tickets shadow-2xl bg-gray-300 transform hover:scale-105 transition duration-200 hover:shadow-3xl hover:bg-white ">
                            <td class="p-2 border-r border-gray-300">
                                <div class="flex align-items-center justify-center ">
                                    <?php $__currentLoopData = $urgenceTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $urgenceTicket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if( $urgenceTicket->ValeurUrgTicket == $ticket->UrgenceTicket): ?>
                                            <div id="cercle" style="background: radial-gradient(circle at 9px 9px, <?php echo e($urgenceTicket->CouleurUrg); ?>, #7F7F7F);"><span class="hidden"><?php echo e($ticket->UrgenceTicket); ?></span></div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </td>
                            <td class="p-2 font-bold border-r border-gray-300">
                                <?php echo e($ticket->NumTicket); ?>

                            </td>
                            <td class="p-2 font-bold border-r border-gray-300">
                                <?php echo e($ticket->TypeTicket); ?>

                            </td>
                            <td class="p-2 border-r border-gray-300 ">
                                <?php $__currentLoopData = $statutTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statutTicket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if( $statutTicket->StatutTicket ==  $ticket->StatutTicket && $statutTicket->ID_TicketStatut == 1): ?>
                                        <span class="bg-green-400 font-semibold rounded-md px-2 flex justify-center">Nouveau</span>
                                    <?php elseif( $statutTicket->StatutTicket ==  $ticket->StatutTicket && $statutTicket->ID_TicketStatut == 2): ?>
                                        <span class="bg-orange-400 font-semibold rounded-md px-2 flex justify-center">Encours</span>
                                    <?php elseif(  $statutTicket->StatutTicket ==  $ticket->StatutTicket && $statutTicket->ID_TicketStatut == 3): ?>
                                        <span class="bg-blue-400 font-semibold rounded-md px-2 flex justify-center">Terminé</span>
                                    <?php elseif(  $statutTicket->StatutTicket ==  $ticket->StatutTicket && $statutTicket->ID_TicketStatut == 4): ?>
                                        <span class="bg-red-400 font-semibold rounded-md px-2 flex justify-center">Annulé</span>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td class="p-2 font-bold border-r border-gray-300">
                                <?php echo e($ticket->CodeUserTicket); ?>

                            </td>
                            <td class="p-2 font-bold border-r border-gray-300 ">
                                <?php echo e($ticket->NumSerieTicket); ?>

                            </td>
                            <td class="p-2 font-bold border-r border-gray-300">
                                <?php echo e($ticket->Agence); ?>

                            </td>
                            <td class="p-2 font-bold border-r border-gray-300 ">
                                <?php echo e($ticket->NumIntTicket); ?>

                            </td>
                            <td class="p-2 pt-4 font-bold border-r border-gray-300 flex justify-center cursor-pointer">
                                <p title="<?php echo e($ticket->ProbTicket); ?>"><i class="material-icons-outlined">description</i></p>
                            </td>
                            <td class="p-2 font-bold border-r border-gray-300 ">
                                <?php echo e($ticket->CodeClientTicket); ?>

                            </td>
                            <td class="p-2 font-bold border-r border-gray-300 ">
                                <?php echo e($ticket->DateTicket); ?>

                            </td>
                            <td class="p-2 font-bold border-r border-gray-300 ">
                                <?php echo e($ticket->DateFinTicket); ?>

                            </td>
                            <td class="p-2 pt-4">
                                <a href="<?php echo e(route('tickets.show', $ticket->ID_Ticket)); ?>" class="text-gray-600 hover:text-gray-800 mr-2" title="Voir ticket">
                                    <i class="material-icons-outlined">visibility</i>
                                </a>
                                <a href="<?php echo e(route('tickets.edit', $ticket->ID_Ticket)); ?>"  class="text-gray-600 hover:text-gray-800 mx-2" title="Modifier ticket">
                                    <i class="material-icons-outlined">edit</i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    <div><?php echo e($tickets->links()); ?></div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Test-Tailwind_v5\resources\views/tickets/index.blade.php ENDPATH**/ ?>