<x-app-layout>
    <x-slot name="header">
        {{ __('About Us') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card class="p-6 sm:p-8 text-metallic-platinum space-y-6">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-accent-gold">ABB Ltd: A Comprehensive Overview</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-transparent via-accent-cyan to-transparent mx-auto mt-4">
                    </div>
                </div>

                <div class="space-y-4 text-base leading-relaxed">
                    <p>
                        <strong class="text-white block mb-2">Business Focus:</strong>
                        ABB is a global leader in automation technology, robotics, electrification, and digital
                        solutions, operating in over 100 countries. The company focuses on improving industrial
                        efficiency, sustainability, and productivity through advanced technology systems.
                    </p>

                    <p>
                        <strong class="text-white block mb-2">History and Background:</strong>
                        ABB's origins date back to the late 19th century. It was formed in 1988 through the merger of
                        two long-standing European engineering companies:
                    </p>
                    <ul class="list-disc list-inside space-y-2 ml-4 border-l-2 border-white/10 pl-4">
                        <li><span class="text-accent-cyan font-bold">ASEA</span> (Allmänna Svenska Elektriska
                            Aktiebolaget): Founded in 1883 in Sweden, ASEA was a leader in electrical engineering and
                            automation.</li>
                        <li><span class="text-accent-cyan font-bold">BBC</span> (Brown, Boveri & Cie): Founded in 1891
                            in Switzerland, BBC specialized in power generation equipment and systems.</li>
                    </ul>
                    <p>
                        The merger created a powerful company in the field of electrical engineering, leveraging the
                        strengths of both ASEA and BBC for expansion in automation, robotics, power grids, and
                        industrial digitalization.
                    </p>

                    <p>
                        ABB Ltd is a leading global technology company focused on electrification, robotics, automation,
                        and motion. It primarily operates in four business segments: Electrification, Industrial
                        Automation, Motion, and Robotics & Discrete Automation. ABB invests heavily in innovation and
                        Research & Development (R&D) to stay at the forefront of sustainable technology.
                    </p>

                    <div class="bg-primary-midnight/50 p-6 rounded-xl border border-white/5 mt-6">
                        <strong class="text-accent-gold block mb-4 text-lg">Key Areas of Investment:</strong>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-accent-cyan rounded-full mt-2 mr-2 shrink-0"></span>
                                <span><strong>Electrification:</strong> Expanding solutions for electrical power
                                    distribution, renewable integration, and electric vehicle (EV)
                                    infrastructure.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-accent-cyan rounded-full mt-2 mr-2 shrink-0"></span>
                                <span><strong>Robotics & Automation:</strong> Improving advanced robotics systems,
                                    autonomous operations, and AI-driven processes.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-accent-cyan rounded-full mt-2 mr-2 shrink-0"></span>
                                <span><strong>Digital Solutions:</strong> Offering digital solutions via ABB Ability™,
                                    enabling Internet of Things (IoT), cloud, and software-based automation.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-accent-cyan rounded-full mt-2 mr-2 shrink-0"></span>
                                <span><strong>Sustainability:</strong> Focusing on reducing emissions, energy
                                    efficiency, and minimizing operational waste in industrial sectors.</span>
                            </li>
                        </ul>
                    </div>

                    <p class="italic text-metallic-silver mt-6">
                        With strategic acquisitions, partnerships, and a focus on next-generation technologies, ABB is
                        positioning itself as a key player in the global transformation towards more sustainable and
                        efficient industrial operations.
                    </p>
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>