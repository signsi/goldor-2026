import { __experimentalNumberControl as NumberControl } from '@wordpress/components';


const SpacingControl = ({
	value,
	onChange,
	label,
	min = 1,
	max = 13,
}) => {

	return (
		<div class="control-wrapper py-8">
			<label className="flex-1 relative pb-2">{label}</label>
			<div className="spacing-control relative flex gap-2">
				<div className="flex-1 relative">
					<div className="spacing-control__slider flex h-full items-center justify-center">
						<input
							type="range"
							min={min}
							max={max}
							value={parseInt(value)}
							onInput={e => {
								const val = e.target.value
								const intVal = parseInt(val)
								onChange(intVal)
							}}
							className="slider w-full"
							id="myRange"
						/>
					</div>
				</div>
				<div className="flex-1 relative">
					<div className='spacing-control__inputs flex h-full items-center justify-center [&>div]:!mb-0'>
						<NumberControl
							className="w-full"
							min={min}
							max={max}
							value={value}
							onChange={onChange}
						/>
					</div>
				</div>
				<div className="flex-1 relative">
					<div className='spacing-control__reset flex h-full items-center justify-center'>
						<button className='w-full'>Zurücksetzen</button>
					</div>
				</div>
			</div>
		</div>
	)

}

export default SpacingControl;